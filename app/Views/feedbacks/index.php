<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
<form method="post" action="<?= site_url('feedbacks/store/'.$participantId) ?>">
    <!-- Your form fields for name, email, and message -->
    <div class="rate">
    <input type="radio" id="star5" name="rating" value="5" />
    <label for="star5" title="Eccezionale">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" />
    <label for="star4" title="Eccellente">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" />
    <label for="star3" title="Molto bene">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" />
    <label for="star2" title="Bene">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" />
    <label for="star1" title="Giusto">1 star</label>
  </div>
    <textarea name="message" placeholder="Report Message"></textarea>

    <button type="submit">Submit Report</button>
</form>

<style>
    *{
    margin: 0;
    padding: 0;
    }
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
</style>
<?= $this->endSection() ?>
