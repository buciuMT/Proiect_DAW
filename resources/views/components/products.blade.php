<div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($carti as $carte)
        @include('components.product',$carte)
    @endforeach
    </div>
    @include('components.smart_buttonjs')
</div>
