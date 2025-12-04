@if(str_contains($attributes->get('class', ''), 'block') || str_contains($attributes->get('class', ''), 'h-'))
    {{-- Tailwind/Breeze Layout --}}
    <div class="flex items-center">
        <svg width="36" height="36" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
            <path d="M20 2L4 8V18C4 26.5 8.5 34.5 20 38C31.5 34.5 36 26.5 36 18V8L20 2Z" fill="url(#gradient1)" stroke="#0d6efd" stroke-width="2"/>
            <path d="M16 20L19 23L24 17" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <defs>
                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#0d6efd;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#0a58ca;stop-opacity:1" />
                </linearGradient>
            </defs>
        </svg>
        <span class="font-bold text-blue-600" style="font-size: 1.1rem; letter-spacing: 0.5px;">DS CodeRubix</span>
    </div>
@else
    {{-- Bootstrap Layout --}}
    <div class="d-flex align-items-center">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
            <path d="M20 2L4 8V18C4 26.5 8.5 34.5 20 38C31.5 34.5 36 26.5 36 18V8L20 2Z" fill="url(#gradient1)" stroke="#0d6efd" stroke-width="2"/>
            <path d="M16 20L19 23L24 17" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <defs>
                <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#0d6efd;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#0a58ca;stop-opacity:1" />
                </linearGradient>
            </defs>
        </svg>
        <span class="ms-2 fw-bold text-primary" style="font-size: 1.2rem; letter-spacing: 0.5px;">DS CodeRubix</span>
    </div>
@endif
