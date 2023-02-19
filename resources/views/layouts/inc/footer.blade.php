<footer>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3 class="mb-3">SHOPS</h3>
                <ul>
                    <li><a href="#">New In</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Schuhe Shoes</a></li>
                    <li><a href="#">Bags & Accessories</a></li>
                    <li><a href="#">Top Brands</a></li>
                    <li><a href="#">Sales & Special Offers</a></li>
                    <li><a href="#">Lookbook</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h3 class="mb-3">INFORMATION</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">New Collection</a></li>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Manufacturers</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h3 class="mb-3">CUSTOMER SERVICE</h3>
                <ul>
                    <li><a href="#">Search Terms</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Help & FAQs</a></li>
                    <li><a href="#">Consultant</a></li>
                    <li><a href="#">Store Location</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h3 class="mb-3">NEWSLETTER</h3>
                <p>Sign Up for News Letter</p>
                <form>
                    <input type="email" name="email" placeholder="Type Your E-mail"><br>
                    <button class="mt-2" type="submit">SUBSCRIBE</button>
                </form>
                <ul class="icons mt-2">
                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-tumblr-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-vimeo-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="dark-footer">
    <div class="container">
        <p>&#169; Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet.</p>
        <div class="icon-div justify-content-end">
            <ul class="icons">
                <li><i class="fa-brands fa-cc-visa"></i></li>
                <li><i class="fa-brands fa-cc-mastercard"></i></li>
                <li><i class="fa-brands fa-cc-paypal"></i></li>
            </ul>
        </div>
    </div>
</div>
<script>
    function change(rowId, value){
        if(value != null && value >=1){
            document.getElementById(rowId).href='http://127.0.0.1:8000/cart/edit/'+rowId+'?qty='+value;
        }
    }
</script>
</body>
</html>
