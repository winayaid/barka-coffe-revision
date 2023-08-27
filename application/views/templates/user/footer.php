<!-- Footer Section -->
<footer class="bg-primary py-8">
    <div class="container mx-auto">
        <h2 class="text-white text-lg font-bold mb-4">Kontak</h2>
        <div class="flex space-x-4">
            <img src="<?= base_url(); ?>/assets/images/email-white.svg" alt="Facebook Icon" class="w-5 h-5" />
            <img src="<?= base_url(); ?>/assets/images/instagram-white.svg" alt="Twitter Icon" class="w-5 h-5" />
            <img src="<?= base_url(); ?>/assets/images/call-white.svg" alt="Instagram Icon" class="w-5 h-5" />
        </div>
    </div>
</footer>

<script>
let orderCount = 1
let orderCountInput = document.getElementById("jumlah_beli")

function increaseOrder() {
    orderCount++
    document.getElementById(
        "orderCount"
    ).textContent = `Total Order: ${orderCount}`
    orderCountInput.value = orderCount
}

function decreaseOrder() {
    if (orderCount > 0) {
        orderCount--
        document.getElementById(
            "orderCount"
        ).textContent = `Total Order: ${orderCount}`
        orderCountInput.value = orderCount
    }
}
</script>
<!-- End Footer Section -->
</body>

</html>