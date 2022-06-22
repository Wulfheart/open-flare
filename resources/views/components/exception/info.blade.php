@props(['exception', 'message', 'php_version', 'laravel_version'])

<x-card>
    <main id="exception" class="z-10 flex-grow min-w-0">
        <div class="overflow-hidden">
            <div class="px-6 sm:px-10 py-8 overflow-x-auto">
                <header class="flex items-center justify-between gap-2">
                    <span class="py-1 px-4 items-center flex gap-3 rounded-sm bg-gray-500/5">
                        <span class="inline-flex flex-wrap items-baseline">
                            {{ $exception }}
                        </span>
                    </span>
                    <div class="grid grid-flow-col justify-end gap-4 text-sm text-gray-500">
                        <span>
                            <span class="tracking-wider">PHP</span>
                            &nbsp;{{ $php_version }}
                        </span>
                        <span class="inline-flex items-center gap-1">
                            <x-fab-laravel class="h-4"/>
                             &nbsp;{{ $laravel_version }}
                        </span>
                    </div>
                </header>
                <div class="my-4 font-semibold leading-snug text-xl">
                    <div class="line-clamp-2">
                        {{ $message }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-card>