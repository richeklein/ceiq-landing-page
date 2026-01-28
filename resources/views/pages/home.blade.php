{{--
Home page / landing page.
Main marketing page for CEIQ.
--}}
<x-layouts.app title="CEIQ | Community Engagement Intelligence for K-12">
    {{-- Hero Section --}}
    <section class="hero" x-data>
        <div class="blob blob1"></div>
        <div class="blob blob2"></div>
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <h1>
                        The future-ready
                        <span class="highlight">community empowerment</span>
                        platform
                    </h1>
                    <p>
                        Community Engagement IQ (CEIQ) bridges the gap between community engagement data and measurable student
                        success. K-12 leaders finally have a data-driven blueprint to prove impact,
                        justify funding, and scale what works.
                    </p>
                    <div class="hero-actions">
                        <button type="button" class="btn btn-primary" @click="$dispatch('open-demo-modal')">Request a Demo</button>
                    </div>
                </div>
                <div class="hero-visual">
                    <img src="{{ asset('images/hero-3.webp') }}" alt="CEIQ Dashboard Preview" class="hero-screenshot" />
                </div>
            </div>
        </div>
    </section>

    {{-- Platform Section --}}
    <section class="storyline" id="platform">
        <div class="container">
            <header>
                <p class="subtitle">The Complete Platform</p>
                <h2>Action-Level Intelligence</h2>
                <p>
                    Traditional surveys measure sentiment. CEIQ inventories the critical actions that build
                    resilient school communities—giving you predictive data, not just reflections.
                </p>
            </header>

            {{-- Feature Slider --}}
            <div class="feature-slider-wrapper" x-data="{ activeSlide: 0, totalSlides: 5, interval: null }"
                 x-init="interval = setInterval(() => activeSlide = (activeSlide + 1) % totalSlides, 8000)"
                 @mouseenter="clearInterval(interval)"
                 @mouseleave="interval = setInterval(() => activeSlide = (activeSlide + 1) % totalSlides, 8000)">
                <div class="feature-slider">
                    {{-- Slide 1: Action-Level Data --}}
                    <div class="feature-slide" :class="{ 'is-active': activeSlide === 0 }">
                        <div class="feature-slide-content">
                            <h3 class="slide-header">Beyond Sentiment</h3>
                            <p>
                                We capture what stakeholders actually do, not just how they feel. This shift from sentiment
                                to behavior gives you predictive power and measurable ROI.
                            </p>
                            <ul class="feature-checklist">
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Quantify the Unquantifiable</strong>
                                        <p>Turn community engagement activities into measurable data points.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Predictive Power</strong>
                                        <p>Correlate engagement behaviors to attendance, retention, and outcomes.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Justify Your Strategy</strong>
                                        <p>Present evidence-based ROI to boards, funders, and stakeholders.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="feature-slide-image">
                            <img src="{{ asset('images/slides/1.webp') }}" alt="CEIQ Engagement Metrics Chart" />
                        </div>
                    </div>

                    {{-- Slide 2: Dashboard Overview --}}
                    <div class="feature-slide" :class="{ 'is-active': activeSlide === 1 }">
                        <div class="feature-slide-content">
                            <h3 class="slide-header">Your Command Center</h3>
                            <p>
                                Your central hub for tracking survey progress, monitoring response rates, and viewing real-time engagement insights across your entire organization.
                            </p>
                            <ul class="feature-checklist">
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Survey Timeline Management</strong>
                                        <p>Track preparation, active, and post-survey phases at a glance.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Response Rate Tracking</strong>
                                        <p>Monitor participation from students, parents, teachers, and leaders.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Progress Highlights</strong>
                                        <p>See your CEIQ stage breakdown with Initial, Developing, Achieving, and Sustaining metrics.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="feature-slide-image">
                            <img src="{{ asset('images/slides/2.webp') }}" alt="CEIQ Dashboard Overview" />
                        </div>
                    </div>

                    {{-- Slide 3: CEIQ Matrix --}}
                    <div class="feature-slide" :class="{ 'is-active': activeSlide === 2 }">
                        <div class="feature-slide-content">
                            <h3 class="slide-header">The CEIQ Matrix</h3>
                            <p>
                                Visualize engagement data across all stakeholder groups with our comprehensive matrix view. Identify patterns and prioritize areas for improvement.
                            </p>
                            <ul class="feature-checklist">
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Cross-Stakeholder Analysis</strong>
                                        <p>Compare responses from students, parents, staff, and teacher leaders.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Areas of Influence</strong>
                                        <p>Track Teaching & Learning, Safety, Community Climate, and Character Education.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Color-Coded Insights</strong>
                                        <p>Quickly identify strengths and opportunities with visual performance indicators.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="feature-slide-image">
                            <img src="{{ asset('images/slides/3.webp') }}" alt="CEIQ Matrix View" />
                        </div>
                    </div>

                    {{-- Slide 4: Student Results --}}
                    <div class="feature-slide" :class="{ 'is-active': activeSlide === 3 }">
                        <div class="feature-slide-content">
                            <h3 class="slide-header">Stakeholder Insights</h3>
                            <p>
                                Deep dive into stakeholder-specific results with detailed breakdowns, trend analysis, and actionable metrics that drive improvement.
                            </p>
                            <ul class="feature-checklist">
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Stage-Based Progress</strong>
                                        <p>Track movement from Initial through Sustaining stages over time.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Key Metric Tracking</strong>
                                        <p>Monitor Strong Relationships, Communication, Well-Being, and Inclusivity.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Period Comparisons</strong>
                                        <p>See how metrics change from period to period with trend indicators.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="feature-slide-image">
                            <img src="{{ asset('images/slides/4.webp') }}" alt="CEIQ Student Results Dashboard" />
                        </div>
                    </div>

                    {{-- Slide 5: EmpowerAI --}}
                    <div class="feature-slide" :class="{ 'is-active': activeSlide === 4 }">
                        <div class="feature-slide-content">
                            <h3 class="slide-header">EmpowerAI</h3>
                            <p>
                                EmpowerAI analyzes data across your entire CEIQ platform, cross-referencing institutional goals and state requirements to deliver actionable insights tailored to your district.
                            </p>
                            <ul class="feature-checklist">
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>AI-Powered Analysis</strong>
                                        <p>Surface patterns and insights that would take weeks to uncover manually.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Best Practice Alignment</strong>
                                        <p>Recommendations grounded in state requirements and proven strategies.</p>
                                    </div>
                                </li>
                                <li>
                                    <svg class="check-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <div>
                                        <strong>Actionable Recommendations</strong>
                                        <p>Get specific next steps, not just data—know exactly what to prioritize.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="feature-slide-image">
                            <img src="{{ asset('images/slides/5.webp') }}" alt="CEIQ EmpowerAI Insights" />
                        </div>
                    </div>
                </div>

                {{-- Slider Dots --}}
                <div class="feature-slider-dots">
                    <template x-for="(slide, index) in totalSlides" :key="index">
                        <button type="button"
                                class="dot"
                                :class="{ 'is-active': activeSlide === index }"
                                @click="activeSlide = index"
                                :aria-label="'Go to slide ' + (index + 1)">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- Difference Section --}}
    <section class="features" id="difference">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">The CEIQ Difference</p>
                <h2>
                    Stakeholder Intelligence. <span class="highlight">Elevated.</span><br />
                    Community Empowerment. <span class="highlight">Achieved.</span>
                </h2>
                <p>
                    Four pillars designed to transform how K-12 leaders understand, measure, and
                    strengthen community engagement.
                </p>
            </div>

            <div class="feature-grid">
                <x-feature-card title="Customizable Survey Design" icon-color="#3b82f6">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </x-slot:icon>
                    Build action-level surveys aligned with state engagement standards. Our research-backed
                    inventory captures what truly matters for student success.
                </x-feature-card>

                <x-feature-card title="Advanced Filtering & Analytics" icon-color="#6366f1">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
                    </x-slot:icon>
                    Drill into engagement data by demographics, schools, or custom segments. Uncover
                    hidden patterns and prioritize high-impact opportunities.
                </x-feature-card>

                <x-feature-card title="Scalable & Adaptable Solution" icon-color="#8b5cf6">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                    </x-slot:icon>
                    From single schools to entire districts, CEIQ grows with your needs. Add sites, users,
                    and custom surveys without complexity.
                </x-feature-card>

                <x-feature-card title="EmpowerAI: Data to Decisive Action" icon-color="#0ea5e9">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                        </svg>
                    </x-slot:icon>
                    Our AI-powered engine transforms raw engagement data into actionable insights,
                    stakeholder stories, and strategic recommendations.
                </x-feature-card>
            </div>
        </div>
    </section>


    {{-- Values Section --}}
    <section class="about-section alt-bg" id="values">
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

    {{-- Resources Section --}}
    <section class="resources" id="weekly-resources">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">Newsletter</p>
                {{-- <h2>CEIQ Impact Brief</h2> --}}
            </div>

            <div class="resources-grid">
                <div class="resource-highlight">
                    <iframe src="https://ceiq.substack.com/embed" width="480" height="320" style="border:none; background:transparent; border-radius:8px;" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>

            {{-- Old newsletter form (kept for reference)
            <div class="resources-grid">
                <div class="resource-highlight">
                    <h3>Request the CEIQ Impact Brief</h3>
                    <p>
                        Get our latest updates and insights on community engagement and practical strategies delivered straight to your inbox.
                    </p>

                    @if(session('success'))
                        <div class="flash-message success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="flash-message error">
                            Please correct the errors below.
                        </div>
                    @endif

                    <form class="resource-form" action="{{ route('resource-request.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <input
                                type="text"
                                name="name"
                                placeholder="Full Name"
                                value="{{ old('name') }}"
                                required
                                class="{{ $errors->has('name') ? 'input-error' : '' }}"
                            />
                            <input
                                type="email"
                                name="email"
                                placeholder="Email Address"
                                value="{{ old('email') }}"
                                required
                                class="{{ $errors->has('email') ? 'input-error' : '' }}"
                            />
                        </div>
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        <div class="form-row">
                            <select name="role" required class="{{ $errors->has('role') ? 'input-error' : '' }}">
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Your Role</option>
                                <option value="Parent" {{ old('role') == 'Parent' ? 'selected' : '' }}>Parent</option>
                                <option value="Teacher" {{ old('role') == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                <option value="Principal" {{ old('role') == 'Principal' ? 'selected' : '' }}>Principal</option>
                                <option value="Family or Community Engagement Lead" {{ old('role') == 'Family or Community Engagement Lead' ? 'selected' : '' }}>Family & Community Engagement Lead</option>
                                <option value="District Leader" {{ old('role') == 'District Leader' ? 'selected' : '' }}>District Leader</option>
                                <option value="Other" {{ old('role') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <input
                                type="text"
                                name="organization"
                                placeholder="Organization (Optional)"
                                value="{{ old('organization') }}"
                            />
                        </div>
                        @error('role')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        <label class="resource-checkbox">
                            <input type="checkbox" name="preview" value="1" {{ old('preview', true) ? 'checked' : '' }} />
                            <span>Send me the CEIQ Impact Brief newsletter (you can unsubscribe at any time)</span>
                        </label>
                        <button type="submit" class="btn btn-primary">Send me the Impact Brief</button>
                    </form>

                </div>
            </div>
            --}}
        </div>
    </section>


    {{-- CTA Section --}}
    <x-cta-section
        id="contact"
        title="Ready to Transform Your School or District?"
        subtitle="Learn how CEIQ bridges the gap between engagement activities and measurable outcomes."
        button-text="Schedule Your Demo"
    />
</x-layouts.app>
