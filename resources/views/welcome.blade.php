<x-layout>
    <x-container.base>
        <x-exception.info exception="Exception" message="HELP2" laravel_version="1" php_version="2"></x-exception.info>
        <x-exception.stacktrace :stacktraces="$exception->stacktraces"/>
    </x-container.base>
</x-layout>