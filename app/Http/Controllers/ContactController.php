<?php

namespace App\Http\Controllers;

use App\Content\CompanyContent;
use App\Content\ContactContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact', [
            'intro' => ContactContent::intro(),
            'subjects' => ContactContent::subjects(),
            'company' => CompanyContent::profile(),
            'seo' => ContactContent::seo(),
        ]);
    }

    /**
     * Handle the contact form submission.
     *
     * IMPORTANT: This is currently a STATIC/DEMO handler. It validates the
     * submission using standard Laravel form validation and CSRF protection
     * (already wired up via the <x-forms.contact-form> component), but it
     * does NOT persist the message anywhere or send an email yet.
     *
     * Future wiring (no frontend changes required):
     *   1. Add a ContactMessage model + migration.
     *   2. Persist $validated to the database (ContactMessage::create(...)).
     *   3. Optionally dispatch a Mail/Notification to the team.
     *   4. Optionally queue the job for async delivery.
     *
     * The Blade form already posts to route('contact.store'), so none of
     * that requires touching the view layer.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:150'],
            'subject' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // TODO (future dynamic phase): persist $validated and/or send notification.
        // ContactMessage::create($validated);
        // Mail::to(config('company.email'))->send(new NewContactMessage($validated));

        return redirect()
            ->route('contact')
            ->with('status', 'demo-submitted');
    }
}
