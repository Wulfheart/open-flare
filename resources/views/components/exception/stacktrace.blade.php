@props(['stacktraces' => null])

@isset($stacktraces)
    <div>
        <section class="flex flex-col border-t lg:border-t-0 border-gray-200">
            <header class="text-gray-500 flex-none z-30 h-16 px-6 sm:px-10 flex items-center justify-end"><span
                            class="inline-flex flex-wrap items-baseline hover:underline flex items-center text-sm"><span>routes</span><span>/</span><span
                                class="font-semibold">web</span><span>.php</span><span class="whitespace-nowrap">:<span
                                    class="font-mono text-xs">26</span></span></span></header>
        </section>
    </div>
@endisset
