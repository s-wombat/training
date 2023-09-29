<x-app-layout>
    <x-layout>
        <h1>Tariffs:</h1>
        <form action="{{ route('tariffs.up') }}" method="GET" name="upgrade">
            @csrf

            <p style="margin-top: 30px">Tariff plan:</p>
            <div style="display: flex;">
                <select name="tariffId" id="tariffs">
                    @foreach ($tariffsList as $item)
                            <option @if(!empty($tariffUser) && $item['id'] == $tariffUser->tariff_id) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-top: 10px">Upgrade</button>

            <p style="margin-top: 30px">Volume User Disk:</p>
            <div style="display: flex">
                <input type="text" name="disk" value="{{ isset($tariffUser->user_ram_mb) ? $tariffUser->user_ram_mb : '' }}">
                <button type="submit" class="btn btn-secondary" style="margin-top: 10px">Save</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
         @endif

         @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

    </x-layout>
</x-app-layout>