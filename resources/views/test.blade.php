<script src="https://cdn.auth0.com/js/lock-passwordless-2.2.min.js"></script>
<script type="text/javascript">
  function login(){
    // Initialize Passwordless Lock instance
    var lock = new Auth0LockPasswordless('CoF2EjOPDztPqNjQTU_mAJfJR45vil7i', 'lets-eat.auth0.com');
    // Open Lock in SMS mode
    lock.sms( {callbackURL: 'http://dev.lets-eat.co/auth0/callback'} );
  }
</script>
<a href="javascript:login()">Login</a>