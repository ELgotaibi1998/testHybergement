<h1>Bonjour {{Auth::user()->name}}</h1>
<p>Votre demande a été accepter 
    <br>
    l'article {{ $mail->demandes()->withTrashed()->get()[0]->articles()->withTrashed()->get()[0]->designation}}   sera affecter le {{ $mail->dateReception}} <br>
    l'emergent de reception :  {{ $mail->emergentReception}}
</p>
<a href="http://127.0.0.1:8000">Consulté le site </a>