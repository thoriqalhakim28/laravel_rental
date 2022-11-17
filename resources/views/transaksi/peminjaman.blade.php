<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('simpanTransaksi') }}">
            @csrf

            <!-- Peminjam -->
            <div class="mt-4">
                <x-input-label for="userId" :value="__('Peminjam')" />
                <select id="userId" name='userId' :value="old('userId')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option selected>-- Pilih dahulu --</option>
                    <option value="1">Thoriq</option>
                </select>
                <x-input-error :messages="$errors->get('userId')" class="mt-2" />
            </div>

            <!-- Kendaraan -->
            <div class="mt-4">
                <x-input-label for="vehicleId" :value="__('Kendaraan')" />
                <select id="vehicleId" name='vehicleId' :value="old('vehicleId')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option selected>-- Pilih dahulu --</option>
                    <option value="1">Innova Reborn 2020</option>
                    <option value="2">Brio Satya 2020</option>
                    <option value="3">Yamaha Nmax</option>
                    <option value="4">Honda PCX 2021</option>
                    <option value="5">Bus MB 1830 O500R 2021</option>
                    <option value="6">Bus MB 1626 NG 2021</option>
                </select>
                <x-input-error :messages="$errors->get('vehicleId')" class="mt-2" />
            </div>

            <!-- Start -->
            <div class="mt-4">
                <x-input-label for="startDate" :value="__('Start')" />
                <x-text-input datepicker id="startDate" class="block mt-1 w-full" type="date" name="startDate" :value="old('startDate')" required />

                <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
            </div>

            <!-- End -->
            <div class="mt-4">
                <x-input-label for="endDate" :value="__('End')" />
                <x-text-input datepicker id="endDate" class="block mt-1 w-full" type="date" name="endDate" :value="old('endDate')" required />

                <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Submit') }}
                </x-primary-button>

                <x-button-reset class="ml-4">
                    {{ __('Reset') }}
                </x-button-reset>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
