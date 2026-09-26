<style>
/* Modern Automotive Dark Slate & Ambient Glow Login Page */
body.fi-body:has(.fi-simple-page) {
    background: radial-gradient(circle at 10% 10%, #1e293b 0%, #0f172a 45%, #020617 100%) !important;
    min-height: 100vh;
}

/* Ambient glow accents */
body.fi-body:has(.fi-simple-page)::before {
    content: '';
    position: fixed;
    top: -150px;
    left: -150px;
    width: 650px;
    height: 650px;
    background: radial-gradient(circle, rgba(37, 99, 235, 0.28) 0%, rgba(37, 99, 235, 0) 70%);
    pointer-events: none;
    z-index: 0;
}

body.fi-body:has(.fi-simple-page)::after {
    content: '';
    position: fixed;
    bottom: -150px;
    right: -150px;
    width: 650px;
    height: 650px;
    background: radial-gradient(circle, rgba(234, 179, 8, 0.2) 0%, rgba(234, 179, 8, 0) 70%);
    pointer-events: none;
    z-index: 0;
}

/* Elevated Frosted Glass Card */
.fi-simple-page .fi-simple-main {
    position: relative;
    z-index: 10;
    max-width: 30rem;
    margin: auto;
}

.fi-simple-page .fi-simple-main-ctn {
    background: rgba(255, 255, 255, 0.94) !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
    border: 1px solid rgba(255, 255, 255, 0.8) !important;
    border-radius: 1.5rem !important;
    box-shadow: 0 25px 50px -12px rgba(2, 6, 23, 0.65), 0 0 0 1px rgba(255, 255, 255, 0.2) !important;
    padding: 2.75rem 2.5rem !important;
}

.dark .fi-simple-page .fi-simple-main-ctn {
    background: rgba(15, 23, 42, 0.88) !important;
    border: 1px solid rgba(255, 255, 255, 0.12) !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8) !important;
}

.fi-simple-page .fi-simple-header-heading {
    font-size: 1.7rem !important;
    font-weight: 800 !important;
    letter-spacing: -0.03em !important;
    color: #0f172a !important;
    margin-top: 0.5rem !important;
}

.dark .fi-simple-page .fi-simple-header-heading {
    color: #f8fafc !important;
}

/* Polished High-Tech Button */
.fi-simple-page form button[type="submit"],
.fi-simple-page .fi-btn {
    border-radius: 0.75rem !important;
    font-weight: 700 !important;
    padding-top: 0.8rem !important;
    padding-bottom: 0.8rem !important;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
    border: none !important;
    box-shadow: 0 4px 16px rgba(37, 99, 235, 0.4) !important;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.fi-simple-page form button[type="submit"]:hover,
.fi-simple-page .fi-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.55) !important;
}

.fi-simple-page input {
    border-radius: 0.65rem !important;
    transition: all 0.15s ease-in-out !important;
}
</style>
