@props(['subjects' => []])

{{--
    Static-phase contact form.

    This posts to route('contact.store') using standard Laravel form
    conventions (@csrf, named fields, @error helpers) even though the
    backend does not persist submissions yet. When the dynamic phase adds
    real handling (DB + email), this markup requires no changes.
--}}

@if(session('status') === 'demo-submitted')
    <div class="mb-6 flex items-start gap-3 rounded-xl border border-brand-accent/30 bg-brand-accent/5 p-4 text-sm text-brand-primary">
        <x-icons.icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-accent" />
        <div>
            <p class="font-semibold">Thanks for reaching out.</p>
            <p class="mt-1 text-brand-muted">This is currently a demo submission — the website is in its static phase and form handling isn't wired up to email or a database yet. We've noted the layout is ready for that once it is.</p>
        </div>
    </div>
@endif

<form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
    @csrf

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="name" class="text-sm font-medium text-brand-primary">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">
            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="text-sm font-medium text-brand-primary">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                   class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">
            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="phone" class="text-sm font-medium text-brand-primary">Phone <span class="text-brand-muted font-normal">(optional)</span></label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                   class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">
            @error('phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="company" class="text-sm font-medium text-brand-primary">Company <span class="text-brand-muted font-normal">(optional)</span></label>
            <input type="text" name="company" id="company" value="{{ old('company') }}"
                   class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">
            @error('company') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="subject" class="text-sm font-medium text-brand-primary">Subject</label>
        <select name="subject" id="subject" required
                class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">
            <option value="" disabled selected>Select a subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}" @selected(old('subject') === $subject)>{{ $subject }}</option>
            @endforeach
        </select>
        @error('subject') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="message" class="text-sm font-medium text-brand-primary">Message</label>
        <textarea name="message" id="message" rows="5" required
                  class="mt-1.5 w-full rounded-lg border border-brand-border px-4 py-3 text-sm text-brand-text focus:border-brand-accent focus:outline-none focus:ring-1 focus:ring-brand-accent">{{ old('message') }}</textarea>
        @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
    </div>

    <x-buttons.primary type="button" class="w-full sm:w-auto">
        Send Message
    </x-buttons.primary>
</form>
