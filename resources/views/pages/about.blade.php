{{--
About Us page.
Company information and values for CEIQ.
--}}
<x-layouts.app title="About Us | CEIQ - Community Engagement Intelligence for K-12">
    {{-- Hero Section --}}
    {{-- <section class="hero">
        <div class="blob blob1"></div>
        <div class="blob blob2"></div>
        <div class="container">
            <div class="hero-content" style="max-width: 48rem; margin: 0 auto;">
                <h1>
                    Empowering Schools Through
                    <span class="highlight">Actionable Intelligence</span>
                </h1>
                <p>
                    We're on a mission to transform how K-12 leaders measure, understand, and strengthen
                    community engagement—moving beyond surveys to action-level insights that drive real outcomes.
                </p>
            </div>
        </div>
    </section> --}}

    {{-- Our Story Section --}}
    <section class="about-section">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">Our Story</p>
                <h2>Why We Built CEIQ</h2>
            </div>
            <div class="story-content">
                <p>
                    Schools and districts invest tremendous resources into community engagement—hosting events,
                    building partnerships, and conducting outreach. Yet when it comes time to demonstrate impact
                    or justify funding, leaders often find themselves relying on anecdotes and gut feelings
                    rather than concrete data.
                </p>
                <p>
                    Traditional satisfaction surveys capture how people feel, but they miss what truly matters:
                    <strong>what people actually do</strong>. The gap between sentiment and action leaves
                    educators without the evidence they need to prove impact, prioritize resources, or
                    predict which initiatives will move the needle on student outcomes.
                </p>
                <p>
                    CEIQ was built to bridge this gap. By creating an action-level inventory of community
                    engagement, we give school leaders the data-driven blueprint they need to transform
                    community relationships from a "nice to have" into a measurable driver of student success.
                </p>
            </div>
        </div>
    </section>

    {{-- What Drives Us Section --}}
    <section class="about-section alt-bg">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">Our Values</p>
                <h2>What Drives Us</h2>
                <p>
                    These principles guide everything we build and every partnership we form.
                </p>
            </div>
            <div class="values-grid">
                <x-value-card title="Data-Driven Decisions" icon-class="value-icon-1">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"/>
                            <path d="m19 9-5 5-4-4-3 3"/>
                        </svg>
                    </x-slot:icon>
                    We believe intuition should be validated by evidence. Our platform transforms abstract
                    engagement into trackable metrics that inform strategic choices.
                </x-value-card>

                <x-value-card title="Community Empowerment" icon-class="value-icon-2">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </x-slot:icon>
                    Strong schools are built on strong communities. We equip all stakeholders—educators,
                    families, and partners—with tools to drive meaningful change.
                </x-value-card>

                <x-value-card title="Measurable Impact" icon-class="value-icon-3">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20V10"/>
                            <path d="M18 20V4"/>
                            <path d="M6 20v-4"/>
                        </svg>
                    </x-slot:icon>
                    Every engagement activity should connect to student outcomes. We help you correlate
                    community actions with attendance, retention, and academic achievement.
                </x-value-card>

                <x-value-card title="Collective Intelligence" icon-class="value-icon-4">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                            <path d="M2 12h20"/>
                        </svg>
                    </x-slot:icon>
                    The best solutions emerge when diverse expertise comes together. CEIQ unites educators,
                    technologists, and community experts to surface insights no single perspective could find.
                </x-value-card>
            </div>
        </div>
    </section>

    {{-- Our Approach Section --}}
    {{-- <section class="about-section">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">Our Approach</p>
                <h2>How CEIQ Works</h2>
            </div>
            <div class="approach-grid">
                <div class="approach-content">
                    <h3>Action-Level Intelligence</h3>
                    <p>
                        Instead of asking "How do you feel about school engagement?", we inventory the specific,
                        critical actions that build resilient communities. This shift from sentiment to behavior
                        gives you a predictive blueprint for what actually works.
                    </p>
                    <ul class="approach-list">
                        <li>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                            <span>Correlate engagement behaviors to academic outcomes</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                            <span>AI-powered insights through EmpowerAI</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                            <span>Aligned with state engagement standards</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                            <span>Scales from single schools to entire districts</span>
                        </li>
                    </ul>
                </div>
                <div class="approach-visual">
                    <svg viewBox="0 0 360 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="nodeGradient" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#60A5FA" />
                                <stop offset="100%" stop-color="#A78BFA" />
                            </linearGradient>
                        </defs>
                        <g stroke="rgba(37,99,235,0.35)" stroke-width="2">
                            <path d="M60 60L180 40L300 70" />
                            <path d="M60 60L90 110L180 120L270 110L300 70" />
                            <path d="M90 110L150 80L210 85L270 110" />
                            <path d="M150 80L180 40L210 85" />
                        </g>
                        <g fill="url(#nodeGradient)" stroke="white" stroke-width="3">
                            <circle cx="60" cy="60" r="14" />
                            <circle cx="90" cy="110" r="12" />
                            <circle cx="150" cy="80" r="10" />
                            <circle cx="180" cy="40" r="16" />
                            <circle cx="210" cy="85" r="10" />
                            <circle cx="270" cy="110" r="12" />
                            <circle cx="300" cy="70" r="14" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- CTA Section --}}
    <x-cta-section
        title="Ready to See CEIQ in Action?"
        subtitle="Discover how action-level intelligence can transform community engagement at your school or district."
        button-text="Schedule Your Demo"
    />
</x-layouts.app>
