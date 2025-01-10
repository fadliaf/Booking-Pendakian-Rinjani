<section>
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Alamat -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-textarea id="alamat" name="alamat" class="mt-1 block w-full" required>{{ old('alamat', $user->alamat) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required>
                <option value="L" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
        </div>

        <!-- Jenis Identitas -->
        <div>
            <x-input-label for="jenis_identitas" :value="__('Jenis Identitas')" />
            <select id="jenis_identitas" name="jenis_identitas" class="mt-1 block w-full" required>
                <option value="KTP" {{ old('jenis_identitas', $user->jenis_identitas) == 'KTP' ? 'selected' : '' }}>KTP</option>
                <option value="SIM" {{ old('jenis_identitas', $user->jenis_identitas) == 'SIM' ? 'selected' : '' }}>SIM</option>
                <option value="KTM" {{ old('jenis_identitas', $user->jenis_identitas) == 'KTM' ? 'selected' : '' }}>KTM</option>
                <option value="Lainnya" {{ old('jenis_identitas', $user->jenis_identitas) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_identitas')" />
        </div>

        <!-- No Identitas -->
        <div>
            <x-input-label for="no_identitas" :value="__('No Identitas')" />
            <x-text-input id="no_identitas" name="no_identitas" type="text" class="mt-1 block w-full" :value="old('no_identitas', $user->no_identitas)" required />
            <x-input-error class="mt-2" :messages="$errors->get('no_identitas')" />
        </div>

        <!-- No HP -->
        <div>
            <x-input-label for="no_hp" :value="__('No HP')" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', $user->no_hp)" required />
            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
        </div>

        <!-- Foto Identitas -->
        <div>
            <x-input-label for="foto_identitas" :value="__('Foto Identitas')" />
            <x-text-input id="foto_identitas" name="foto_identitas" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('foto_identitas')" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
