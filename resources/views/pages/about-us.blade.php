{{--
About Us page.
Company overview and mission for CEIQ.
--}}
<x-layouts.app title="About Us | CEIQ - Community Engagement Intelligence for K-12">
    {{-- About Us Section --}}
    <section class="about-section">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">About Us</p>
                <h2>Built by Educators, for Educators</h2>
            </div>
            <div class="about-us-image">
                <img src="{{ asset('images/ceiq-about-us.webp') }}" alt="CEIQ Team collaborating" />
            </div>
            <div class="story-content">
                <p>
                    At CEIQ, we believe that the strongest communities are built on a foundation of deep understanding and data-driven action. Strategically led by a team of seasoned educators and Ed-Tech innovators with experience in working with some of the largest comprehensive school districts in the United States, CEIQ brings together a wealth of experience and a proven track record of success within the education and technology sectors. Our deep understanding of schools and their unique challenges provides us with a significant competitive advantage, allowing us to build actionable solutions that truly resonate with the needs of schools and districts.
                </p>
                <p>
                    Our history is rooted in providing the essential support schools need to thrive. We don't just provide data; we provide a roadmap for success. Our platform empowers leaders to move from reactive troubleshooting to proactive strategy, ensuring that every student and community member is supported by informed decision-making.
                </p>
            </div>
        </div>
    </section>

    {{-- Benefit Corporation Section --}}
    <section class="about-section alt-bg">
        <div class="container">
            <div class="section-header">
                <p class="subtitle">Our Commitment</p>
                <h2>A Force for Good</h2>
            </div>
            <div class="story-content">
                <p>
                    CEIQ is proud to be a Florida Benefit Corporation. This designation is more than a legal structure—it is a fundamental aspect of our identity and a reflection of our unwavering commitment to both purpose and profit.
                </p>
                <p>
                    As a Benefit Corporation, we have integrated our values directly into our legal framework. This ensures that our mission to be a "force for good" is embedded in our DNA. By prioritizing community impact alongside fiscal responsibility, we attract mission-aligned stakeholders, and ensure a sustainable, impactful future for the communities we serve.
                </p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <x-cta-section
        title="Ready to See CEIQ in Action?"
        subtitle="Discover how action-level intelligence can transform community engagement at your school or district."
        button-text="Schedule Your Demo"
    />
</x-layouts.app>
