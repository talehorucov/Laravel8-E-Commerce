<x-jet-action-section>
    <x-slot name="title">
        {{ __('İki Faktorlu Doğrulama') }}
    </x-slot>

    <x-slot name="description">
        {{ __('İki Faktorlu Doğrulamadan istifadə edərək hesabınıza əlavə təhlükəsizlik əlavə edin.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                {{ __('İki faktorlu doğrulamanı aktiv etmisiniz.') }}
            @else
                {{ __('İki faktorlu doğrulamanı aktiv etməmisiniz.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('İki faktorlu doğrulama aktiv olduqda, doğrulama zamanı təhlükəsiz, təsadüfi bir kod alacaqsınız. Bu kodu telefonunuzun Google Authenticator (Doğrulayıcı) tətbiqindən əldə edə bilərsiniz') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('İki faktorlu doğrulama artıq aktivdir. Telefonunuzun doğrulayıcı tətbiqindən istifadə edərək aşağıdakı QR kodunu tarayın.') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Bu bərpa kodlarını etibarlı bir sənəddə saxlayın. İki faktorlu doğrulama, cihazınız itirildikdə hesabınıza girişi bərpa etmək üçün istifadə edilə bilər.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Aktivləşdir') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Bərpa Kodlarını Yenidən yaradın') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Bərpa kodlarını göstərin') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('Deaktiv Edin') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
