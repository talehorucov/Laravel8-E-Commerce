<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Qeydiyyatdan keçdiyiniz üçün təşəkkürlər! Başlamazdan əvvəl e -poçt ünvanınızı sizə yeni göndərdiyimiz linki tıklayaraq təsdiq edə bilərsinizmi? E -poçtu almamısınızsa, məmnuniyyətlə başqa bir məktub göndərəcəyik.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Qeydiyyat zamanı göstərdiyiniz e -poçt ünvanına yeni bir doğrulama linki göndərildi.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Doğrulama E-poçtunu Yenidən Göndərin') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Çıxış') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
