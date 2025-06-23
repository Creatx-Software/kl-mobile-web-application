<section class="category-header">
    <!-- Background Image -->
    <div class="category-bg-image"></div>
    
    <div class="container text-center">
        <div class="position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Str::limit($eventType->name, 20, '...') }}
                    </li>
                </ol>
            </nav>
            
            <h1 class="category-title mb-3">
                {{-- Mobile: Show truncated version --}}
                <span class="d-block d-md-none">
                    {{ Str::limit($eventType->name, 40, '...') }}
                </span>
                {{-- Desktop: Show full version --}}
                <span class="d-none d-md-block">
                    {{ $eventType->name }}
                </span>
            </h1>
            
            <p class="category-subtitle">
                {{-- Mobile: Show truncated version --}}
                <span class="d-block d-md-none">
                    {{ Str::limit($eventType->description, 80, '...') }}
                </span>
                {{-- Desktop: Show full version --}}
                <span class="d-none d-md-block">
                    {{ $eventType->description }}
                </span>
            </p>
        </div>
    </div>
</section>