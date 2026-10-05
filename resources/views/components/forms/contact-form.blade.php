@props(['subjects' => []])

@if(session('status') === 'demo-submitted')
    <div class="mb-6 flex items-start gap-3 border border-brand-accent/25 bg-brand-accent/5 p-4 text-sm text-brand-heading">
        <x-icons.icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-accent" />
        <div>
            <p class="font-semibold">Thanks for reaching out.</p>
            <p class="mt-1 text-brand-muted">This is currently a demo submission — the website is in its static phase and form handling isn't wired up to email or a database yet.</p>
        </div>
    </div>
@endif

<form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
    @csrf

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-field">
            @error('name') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-field">
            @error('email') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="phone" class="form-label">Phone <span class="font-normal text-brand-muted">(optional)</span></label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-field">
            @error('phone') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="company" class="form-label">Company <span class="font-normal text-brand-muted">(optional)</span></label>
            <input type="text" name="company" id="company" value="{{ old('company') }}" class="form-field">
            @error('company') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="subject" class="form-label">Subject</label>
        <select name="subject" id="subject" required class="form-field">
            <option value="" disabled @selected(old('subject') === null)>Select a subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}" @selected(old('subject') === $subject)>{{ $subject }}</option>
            @endforeach
        </select>
        @error('subject') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="message" class="form-label">Message</label>
        <textarea name="message" id="message" rows="5" required class="form-field">{{ old('message') }}</textarea>
        @error('message') <p class="mt-1 text-xs text-brand-danger">{{ $message }}</p> @enderror
    </div>

    <x-buttons.primary type="button" class="w-full sm:w-auto">
        Send Message
    </x-buttons.primary>
</form>
