<script setup>
import { Link } from '@inertiajs/vue3'

const bubbles = Array.from({ length: 12 }, (_, index) => ({
    id: index,
    left: `${8 + ((index * 17) % 86)}%`,
    delay: `${(index % 6) * -1.7}s`,
    duration: `${9 + (index % 5) * 2}s`,
    size: `${5 + (index % 4) * 4}px`,
}))
</script>

<template>
    <main class="ocean-page">
        <div class="ocean-glow ocean-glow-one" aria-hidden="true"></div>
        <div class="ocean-glow ocean-glow-two" aria-hidden="true"></div>

        <div class="bubbles" aria-hidden="true">
            <span
                v-for="bubble in bubbles"
                :key="bubble.id"
                class="bubble"
                :style="{
                    left: bubble.left,
                    animationDelay: bubble.delay,
                    animationDuration: bubble.duration,
                    width: bubble.size,
                    height: bubble.size,
                }"
            ></span>
        </div>

        <header class="site-header">
            <a class="brand" href="/" aria-label="Samudra, halaman utama">
                <span class="brand-icon">≈</span>
                <span>SAMUDRA</span>
            </a>
            <Link class="header-login" href="/login">Masuk <span aria-hidden="true">↗</span></Link>
        </header>

        <section class="hero">
            <div class="hero-copy">
                <p class="eyebrow"><span></span> RUANG KECIL UNTUK IDE BESAR</p>
                <h1>Temukan ceritamu<br />di <span>bawah permukaan.</span></h1>
                <p class="intro">
                    Selami ruang untuk menyimpan ide, merangkai cerita, dan menemukan
                    inspirasi baru. Perjalananmu dimulai dari sini.
                </p>
                <div class="hero-actions">
                    <Link class="primary-action" href="/login">
                        Mulai menjelajah <span aria-hidden="true">→</span>
                    </Link>
                    <span class="action-note">Lautan ide menantimu</span>
                </div>
            </div>

            <div class="ocean-art" aria-hidden="true">
                <div class="sun-halo"></div>
                <div class="sun"></div>
                <div class="distant-island"></div>
                <div class="wave wave-back"></div>
                <div class="wave wave-middle"></div>
                <div class="wave wave-front"></div>
                <div class="art-caption">
                    <span class="caption-line"></span>
                    <span>DI BAWAH LANGIT YANG SAMA</span>
                </div>
            </div>
        </section>

        <footer class="site-footer">
            <span>MENYELAM LEBIH DALAM, BERKARYA LEBIH BEBAS.</span>
            <span class="footer-coordinates">07° 48' S &nbsp; 110° 22' E</span>
        </footer>
    </main>
</template>

<style scoped>
:global(*) {
    box-sizing: border-box;
}

:global(body) {
    margin: 0;
    font-family: Inter, "Segoe UI", Arial, sans-serif;
}

.ocean-page {
    position: relative;
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    overflow: hidden;
    padding: 0 clamp(24px, 7.2vw, 112px);
    color: #f2fbff;
    background:
        radial-gradient(ellipse at 78% 85%, rgba(0, 127, 161, 0.28), transparent 42%),
        linear-gradient(125deg, #061b2b 0%, #062b40 54%, #06425a 100%);
}

.ocean-glow {
    position: absolute;
    z-index: 0;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
}

.ocean-glow-one {
    top: 5%;
    right: 8%;
    background: rgba(19, 143, 170, 0.13);
}

.ocean-glow-two {
    bottom: -22%;
    left: 25%;
    background: rgba(12, 104, 153, 0.2);
}

.site-header,
.hero,
.site-footer {
    position: relative;
    z-index: 2;
}

.site-header {
    display: flex;
    height: 100px;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(200, 239, 250, 0.12);
}

.brand {
    display: inline-flex;
    align-items: center;
    gap: 11px;
    color: #f2fbff;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-decoration: none;
}

.brand-icon {
    display: grid;
    width: 34px;
    height: 34px;
    place-items: center;
    border: 1px solid rgba(119, 226, 238, 0.55);
    border-radius: 50%;
    color: #82e5ec;
    font-size: 25px;
    font-weight: 400;
    line-height: 1;
}

.header-login {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #d5edf3;
    font-size: 13px;
    text-decoration: none;
    transition: color 180ms ease;
}

.header-login:hover {
    color: #7ce1e8;
}

.header-login span {
    color: #7ce1e8;
    font-size: 17px;
}

.hero {
    display: grid;
    flex: 1;
    grid-template-columns: 1fr 1.02fr;
    align-items: center;
    gap: clamp(24px, 5vw, 80px);
    padding: 48px 0 60px;
}

.hero-copy {
    max-width: 560px;
    padding-bottom: 20px;
}

.eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 27px;
    color: #8bc4d0;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
}

.eyebrow span {
    width: 22px;
    height: 1px;
    background: #70d6dd;
}

h1 {
    margin: 0;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(42px, 5.5vw, 76px);
    font-weight: 400;
    letter-spacing: -0.045em;
    line-height: 1.08;
}

h1 span {
    color: #75d8df;
    font-style: italic;
}

.intro {
    max-width: 420px;
    margin: 24px 0 30px;
    color: #a8c9d3;
    font-size: 15px;
    line-height: 1.8;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
}

.primary-action {
    display: inline-flex;
    min-height: 50px;
    align-items: center;
    justify-content: center;
    gap: 22px;
    padding: 0 21px;
    border: 1px solid #8ae5e9;
    border-radius: 4px;
    background: #80dfe4;
    color: #062b3b;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: transform 180ms ease, background 180ms ease, box-shadow 180ms ease;
}

.primary-action:hover {
    transform: translateY(-2px);
    background: #a0f0ed;
    box-shadow: 0 10px 32px rgba(83, 209, 218, 0.2);
}

.primary-action span {
    font-size: 19px;
    font-weight: 400;
}

.action-note {
    color: #769eaa;
    font-size: 11px;
}

.ocean-art {
    position: relative;
    height: min(56vw, 470px);
    min-height: 320px;
    overflow: hidden;
    isolation: isolate;
    border: 1px solid rgba(162, 225, 234, 0.16);
    background:
        linear-gradient(180deg, rgba(21, 74, 96, 0.05) 0%, rgba(13, 67, 88, 0.2) 52%, #07506a 100%),
        radial-gradient(ellipse at 48% 43%, #4e9bac 0%, #28677d 29%, #123e56 67%, #0a293d 100%);
    box-shadow: 0 24px 90px rgba(0, 0, 0, 0.2);
}

.sun-halo,
.sun {
    position: absolute;
    top: 16%;
    left: 54%;
    transform: translateX(-50%);
    border-radius: 50%;
}

.sun-halo {
    width: 200px;
    height: 200px;
    background: rgba(228, 247, 229, 0.09);
    filter: blur(20px);
}

.sun {
    width: 104px;
    height: 104px;
    background: linear-gradient(145deg, #e4f3d8, #94d4d4);
    box-shadow: 0 0 55px rgba(176, 231, 223, 0.3);
}

.distant-island {
    position: absolute;
    z-index: -1;
    right: 0;
    bottom: 47%;
    left: 0;
    height: 20%;
    background: #143f50;
    clip-path: polygon(0 69%, 11% 61%, 21% 67%, 31% 57%, 41% 65%, 50% 39%, 57% 51%, 67% 30%, 76% 56%, 86% 43%, 100% 53%, 100% 100%, 0 100%);
    opacity: 0.85;
}

.wave {
    position: absolute;
    right: -12%;
    bottom: -22%;
    left: -12%;
    height: 58%;
    border-radius: 48% 52% 0 0 / 17% 19% 0 0;
}

.wave-back {
    bottom: -19%;
    transform: rotate(-7deg);
    background: linear-gradient(165deg, rgba(23, 125, 145, 0.85), #096078 57%, #06435c);
}

.wave-middle {
    bottom: -28%;
    left: -18%;
    transform: rotate(5deg);
    background: linear-gradient(170deg, rgba(14, 111, 134, 0.9), #07536c 63%, #043b53);
}

.wave-front {
    right: -20%;
    bottom: -44%;
    left: -8%;
    transform: rotate(-3deg);
    background: linear-gradient(175deg, #08758a, #07516c 56%, #063d57);
}

.art-caption {
    position: absolute;
    right: 22px;
    bottom: 20px;
    display: flex;
    align-items: center;
    gap: 9px;
    color: rgba(219, 244, 246, 0.72);
    font-size: 8px;
    letter-spacing: 0.16em;
}

.caption-line {
    width: 20px;
    height: 1px;
    background: #7de0e4;
}

.bubbles {
    position: absolute;
    z-index: 1;
    inset: 0;
    overflow: hidden;
    pointer-events: none;
}

.bubble {
    position: absolute;
    bottom: -24px;
    border: 1px solid rgba(166, 231, 236, 0.36);
    border-radius: 50%;
    background: rgba(139, 223, 233, 0.06);
    animation: rise linear infinite;
}

@keyframes rise {
    from {
        opacity: 0;
        transform: translate3d(0, 0, 0);
    }

    12% {
        opacity: 0.6;
    }

    85% {
        opacity: 0.45;
    }

    to {
        opacity: 0;
        transform: translate3d(24px, -105vh, 0);
    }
}

.site-footer {
    display: flex;
    min-height: 68px;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    border-top: 1px solid rgba(200, 239, 250, 0.12);
    color: #7197a3;
    font-size: 9px;
    letter-spacing: 0.16em;
}

.footer-coordinates {
    color: #83b2bd;
    white-space: nowrap;
}

@media (max-width: 760px) {
    .ocean-page {
        min-height: 100svh;
    }

    .site-header {
        height: 76px;
    }

    .hero {
        grid-template-columns: 1fr;
        gap: 36px;
        padding: 54px 0 44px;
    }

    .hero-copy {
        padding-bottom: 0;
    }

    .eyebrow {
        margin-bottom: 20px;
    }

    .intro {
        margin-top: 20px;
    }

    .ocean-art {
        height: 62vw;
        min-height: 260px;
        max-height: 390px;
    }

    .site-footer {
        min-height: 62px;
        font-size: 8px;
        letter-spacing: 0.1em;
    }
}

@media (max-width: 420px) {
    .hero-actions {
        align-items: flex-start;
        flex-direction: column;
        gap: 13px;
    }

    .site-footer {
        align-items: flex-start;
        flex-direction: column;
        justify-content: center;
        gap: 7px;
        padding: 12px 0;
    }
}

@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
    }
}
</style>
