{{--
Demo request modal with form.
Uses Alpine.js for open/close functionality and form submission.
Includes honeypot spam protection.

Place this component once in your layout - it listens for 'open-demo-modal' events.
Trigger it with: <button @click="$dispatch('open-demo-modal')">Request a Demo</button>
--}}
<div
    x-data="{
        open: false,
        loading: false,
        success: false,
        error: '',
        form: {
            name: '',
            email: '',
            organization: '',
            questions: '',
            website: ''
        },
        errors: {},
        async submit() {
            this.loading = true;
            this.error = '';
            this.errors = {};

            try {
                const response = await fetch('{{ route('demo-request.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify(this.form)
                });

                const data = await response.json();

                if (!response.ok) {
                    if (response.status === 422 && data.errors) {
                        this.errors = data.errors;
                        this.error = 'Please correct the errors below.';
                    } else {
                        this.error = data.message || 'Something went wrong. Please try again.';
                    }
                    return;
                }

                this.success = true;
                this.form = { name: '', email: '', organization: '', questions: '', website: '' };
            } catch (e) {
                this.error = 'Network error. Please check your connection and try again.';
            } finally {
                this.loading = false;
            }
        },
        reset() {
            this.success = false;
            this.error = '';
            this.errors = {};
            this.form = { name: '', email: '', organization: '', questions: '', website: '' };
        },
        close() {
            this.open = false;
            setTimeout(() => this.reset(), 300);
        }
    }"
    x-on:open-demo-modal.window="open = true; success = false"
    x-on:keydown.escape.window="if (open) close()"
>
    {{-- Modal Overlay --}}
    <div
        class="demo-modal-overlay"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.self="close()"
        x-cloak
    >
        <div
            class="demo-modal"
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            @click.stop
        >
            {{-- Close button --}}
            <button
                type="button"
                class="demo-modal-close"
                @click="close()"
                aria-label="Close modal"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            {{-- Success state --}}
            <div x-show="success" class="demo-modal-success">
                <div class="demo-modal-success-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <h3>Thank You!</h3>
                <p>We've received your demo request and will be in touch within 24 hours to schedule a time that works for you.</p>
                <button type="button" class="btn btn-primary" @click="close()">Close</button>
            </div>

            {{-- Form state --}}
            <div x-show="!success">
                <div class="demo-modal-header">
                    <h2>Request a Demo</h2>
                    <p>See how CEIQ can transform your community engagement data into actionable insights.</p>
                </div>

                <form @submit.prevent="submit()" class="demo-modal-form">
                    {{-- Honeypot field (hidden from users) --}}
                    <div style="position: absolute; left: -9999px; top: -9999px;" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" x-model="form.website" tabindex="-1" autocomplete="off">
                    </div>

                    {{-- Error message --}}
                    <div x-show="error" x-cloak class="demo-modal-error">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span x-text="error"></span>
                    </div>

                    <div class="demo-modal-field">
                        <label for="demo-name">Full Name <span class="required">*</span></label>
                        <input
                            type="text"
                            id="demo-name"
                            x-model="form.name"
                            :class="{ 'has-error': errors.name }"
                            placeholder="Jane Smith"
                            required
                        >
                        <template x-if="errors.name">
                            <span class="field-error" x-text="errors.name[0]"></span>
                        </template>
                    </div>

                    <div class="demo-modal-field">
                        <label for="demo-email">Work Email <span class="required">*</span></label>
                        <input
                            type="email"
                            id="demo-email"
                            x-model="form.email"
                            :class="{ 'has-error': errors.email }"
                            placeholder="jane@schooldistrict.edu"
                            required
                        >
                        <template x-if="errors.email">
                            <span class="field-error" x-text="errors.email[0]"></span>
                        </template>
                    </div>

                    <div class="demo-modal-field">
                        <label for="demo-organization">School / District</label>
                        <input
                            type="text"
                            id="demo-organization"
                            x-model="form.organization"
                            :class="{ 'has-error': errors.organization }"
                            placeholder="Lincoln Unified School District"
                        >
                        <template x-if="errors.organization">
                            <span class="field-error" x-text="errors.organization[0]"></span>
                        </template>
                    </div>

                    <div class="demo-modal-field">
                        <label for="demo-questions">Questions or Comments</label>
                        <textarea
                            id="demo-questions"
                            x-model="form.questions"
                            :class="{ 'has-error': errors.questions }"
                            placeholder="Tell us about your community engagement goals or any questions you have..."
                            rows="3"
                        ></textarea>
                        <template x-if="errors.questions">
                            <span class="field-error" x-text="errors.questions[0]"></span>
                        </template>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary demo-modal-submit"
                        :disabled="loading"
                    >
                        <span x-show="!loading">Request Demo</span>
                        <span x-show="loading" class="demo-modal-spinner">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-spin">
                                <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
                            </svg>
                            Submitting...
                        </span>
                    </button>

                    <p class="demo-modal-privacy">
                        By submitting, you agree to our <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
