TODO:

https://github.com/spatie/ignition-ui/blob/main/types/types.d.ts
```ts
export declare type ErrorOccurrence = {
    type: 'web' | 'cli' | 'queue' | null;
    entry_point: string;
    exception_message: string;
    exception_class: string;
    application_path: string;
    application_version: string | null;
    notifier_client_name: string;
    language_version?: string;
    framework_version?: string;
    stage: string;
    context_items: {
        env: null | EnvContext;
        dumps: null | DumpContext;
        request: null | RequestContext;
        request_data: null | RequestDataContext;
        logs: null | LogContext;
        queries: null | QueryContext;
        livewire: null | LivewireContext;
        view: null | ViewContext;
        headers: null | HeadersContext;
        session: null | SessionContext;
        cookies: null | CookiesContext;
        user: null | UserContext;
        route: null | RouteContext;
        git: null | GitContext;
    };
    first_frame_class: string;
    first_frame_method: string;
    glows: Array<ErrorGlow>;
    solutions: Array<ErrorSolution>;
    documentation_links: Array<string>;
    frames: Array<ErrorFrame>;
};
```

Rendering: https://github.com/spatie/ignition-ui/blob/main/src/components/context/Context.tsx