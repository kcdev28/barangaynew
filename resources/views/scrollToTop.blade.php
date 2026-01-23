<button id="scrollToTopBtn" class="scroll-to-top-btn" onclick="scrollToTop()">
   &#129093
</button>

<style>
.scroll-to-top-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background:#ffd700;;
    color: black;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 10%;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(27, 127, 59, 0.3);
    transition: all 0.3s ease;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

.scroll-to-top-btn.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.scroll-to-top-btn:hover {
    background: #145a2b;
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(27, 127, 59, 0.4);
}

.scroll-to-top-btn:active {
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .scroll-to-top-btn {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        font-size: 20px;
    }
}
</style>


<script>
window.addEventListener('scroll', function() {
    const scrollBtn = document.getElementById('scrollToTopBtn');
    if (window.pageYOffset > 300) {
        scrollBtn.classList.add('show');
    } else {
        scrollBtn.classList.remove('show');
    }
});


function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
</script>