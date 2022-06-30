@props(['exception', 'message', 'php_version', 'laravel_version'])

<x-card>
    <main id="exception" class="z-10 min-w-0 flex-grow">
        <div class="overflow-hidden">
            <div class="overflow-x-auto px-6 py-8 sm:px-10">
                <header class="flex items-center justify-between gap-2">
                    <span class="flex items-center gap-3 rounded-sm bg-gray-500/5 py-1 px-4">
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
                            <x-fab-laravel class="h-4" />
                            &nbsp;{{ $laravel_version }}
                        </span>
                    </div>
                </header>
                <div class="my-4 text-xl font-semibold leading-snug">
                    <div class="line-clamp-2">
                        {{ $message }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-card>
