<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use App\Models\TariffUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TariffController extends Controller
{
    public function up(Request $request) {

        $tariffsList = Tariff::all(); // список тарифов
        $userId = Auth::id();
        $tariffUser = User::find($userId)->tariffUsers; // текущий тариф у юзера
        $validated = $request->validate([
            'disk' => 'numeric',
        ]);

        if(!empty($request->all())) {
            $tariffs = $request->all();
            $id = $tariffs['tariffId'];
            $disk = $tariffs['disk'];
            $tariff = Tariff::find($id);

            $tariffRequest = [
                'tariff_id'=>$id,
                'user_id'=>$userId,
                'name'=>$tariff->name,
                // 'user_ram_mb'=>$disk,
            ];

            if (isset($tariffUser) && $tariffUser->user_id) {
                if($tariff->ram_mb > $tariffUser->user_ram_mb) {
                    // если новый размер диска больше текущего, то делаем upgrade тарифного плана
                    $tariffUser->update($tariffRequest);
                }
            } else {
                // $tariffRequest['user_ram_mb'] = $disk;
                $tariffUser = TariffUser::create($tariffRequest);
            }

            // если заказывают тариф с меньшим размером диска, нужно сначала уменьшить текущий размер диска до нужного тарифа.
            if ($tariff->ram_mb > $request->disk) {
                // downgrade делаем, только для тарифов с одинаковим размером диска
                $this->userDisk($request->disk, $tariffUser);
            } else {
                return redirect()->route('tariffs.up')
                        ->with('danger','The user disk volume must be equal to the disk volume in the tariff.');
            }
            
            return redirect()->route('tariffs.up')
                        ->with('success','User updated successfully');
        }

        return view('tariffs.update', compact('tariffsList', 'tariffUser'));
    }

    

    private function userDisk($volumeUserDisk, $tariffUser) {

        if(!empty($volumeUserDisk)) {
            $tar = [
                'user_ram_mb'=>$volumeUserDisk,
            ];
            if (isset($tariffUser) && $tariffUser->user_id) {
                $tariffUser->update($tar);
            }
        }
    }


}
