<x-layouts.app :seo="['title' => 'Page Not Found', 'description' => 'The page you were looking for could not be found.', 'robots' => 'noindex, follow']">
    <section class="flex min-h-[70vh] items-center justify-center bg-brand-bg">
        <div class="mx-auto max-w-xl px-6 py-24 text-center lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-brand-accent">404</p>
            <h1 class="h-page mt-4">Page not found</h1>
            <p class="text-body mt-5">
                The page you're looking for doesn't exist or may have moved. Check the URL, or head back to the homepage.
            </p>
            <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">
                <x-buttons.primary route="home">Back to Homepage</x-buttons.primary>
                <x-buttons.secondary route="contact">Contact Us</x-buttons.secondary>
            </div>
        </div>
    </section>
</x-layouts.app>
