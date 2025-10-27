</div> <!-- /main-content -->

<footer class="footer bg-light py-3 mt-4">
    <div class="container text-center">
        <span class="text-muted">&copy; <?= date('Y') ?> Solar Consultant. All rights reserved.</span>
    </div>
</footer>
</body>
</html>
<style>/* --- New Footer Styling --- */

.main-footer {
    background: #ffffff; /* Clean white background */
    padding: 20px 25px;
    margin-top: 30px; /* Space above the footer */
    border-radius: 12px; /* Match the .card style */
    border-top: 1px solid var(--border);
    box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.03); /* Subtle top shadow */
    color: var(--text-light); /* Light text color */
    font-size: 0.9rem;
}

.main-footer .footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Make your brand name link use the theme color */
.main-footer a {
    color: var(--primary); /* Main theme green */
    font-weight: 600;
    text-decoration: none;
}
.main-footer a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

/* Secondary links on the right */
.main-footer .footer-links a {
    margin-left: 15px;
    color: var(--text-light); /* Lighter color for policy links */
    font-weight: 500;
}
.main-footer .footer-links a:hover {
    color: var(--primary);
}

/* Make footer stack on mobile */
@media (max-width: 900px) {
    .main-footer .footer-content {
        flex-direction: column;
        text-align: center;
    }
    .main-footer .footer-links {
        margin-top: 10px;
    }
}</style>