@props(['stacktraces' => null])

@isset($stacktraces)
    <?php
    /** @var \App\Models\Stacktrace $stacktrace */
    $stacktrace = $stacktraces->first();
    ?>
    <div>
        <section class="flex flex-col border-t border-gray-200 lg:border-t-0">
            <header class="z-30 flex h-16 flex-none items-center justify-end px-6 text-gray-500 sm:px-10">
                <span class="flex inline-flex flex-wrap items-center items-baseline text-sm">
                    {{ Str::of($stacktrace->file)->dirname() }}/<span class="font-semibold">{{ Str::of($stacktrace->file)->basename }}</span>
                    <span class="whitespace-nowrap">&nbsp;:
                        <span class="font-mono text-xs">26</span>
                    </span>
                </span>
            </header>

            <main class="flex items-stretch flex-grow overflow-x-auto overflow-y-hidden scrollbar-hidden-x mask-fade-r text-sm">
                <nav class="sticky left-0 flex flex-none z-20 ~bg-white">

                </nav>
            </main>
        </section>
    </div>
@endisset
