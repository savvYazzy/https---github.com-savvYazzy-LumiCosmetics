
<?php require('views/layout/nav.php'); ?>
<?php require('views/layout/header.php'); ?>


<h2 class="contact-heading">Contact Us</h2>
<p class="contact-sub">If you have any existing concerns please reach out through our contact form below. We will try to get back to you as soon as possible</p>

<hr>

<form id="contact-form" class="contact-form-box" action="mail.php" method="post">

    <input name="name" type="text" placeholder="Name" required><br>
 
    <input name="email" type="email" placeholder="Email" required><br>
           
    <input name="phone" type="tel" placeholder="Phone" required><br>
       
    <input name="subject" type="text" placeholder="Subject" required><br>
               
    <textarea name="message" placeholder="Please state your concern" required></textarea><br>

     <button type="submit" class="">Submit Message</button><br>
        <p class="form-messege"></p>
   
</form>
    
                             

















<!-- <form id="contact-form" class="default-form contact-form" action="mail.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Existing Username:</label>
    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="johnappleseed123">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Existing Username:</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="johnappleseed123">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Topic:</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Select</option>
      <option>Existing Order</option>
      <option>Request a Refund</option>
      <option>Return Inquiry</option>
      <option>Feedback</option>
      <option>Other</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Please explain your inquiry in detail | We will respond to you within 1-3 business days.</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input type="submit" name="submit" value="Submit" class="btn btn-primary">

</form> -->



<?php require('views/layout/footer.php'); ?>






