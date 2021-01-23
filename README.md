<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Access_Control_App_0"></a>Access Control App!</h1>
<p class="has-line-data" data-line-start="1" data-line-end="2">Small application for the management of buildings, in order to know who enters and who leaves with their respective data such as the date and time, in addition to a black list where the people who cannot enter will be…</p>
<ul>
<li class="has-line-data" data-line-start="3" data-line-end="4">Laravel 8.12</li>
<li class="has-line-data" data-line-start="4" data-line-end="6">Mysql</li>
</ul>
<h1 class="code-line" data-line-start=6 data-line-end=7 ><a id="Config_Database_6"></a>Config Database!</h1>
<ul>
<li class="has-line-data" data-line-start="8" data-line-end="10">Create a database with the name &quot; api &quot; , skip the quotes.</li>
</ul>
<h1 class="code-line" data-line-start=10 data-line-end=11 ><a id="Running_migrations_seeds_and_run_server__10"></a>Running migrations, seeds and run server !</h1>
<p class="has-line-data" data-line-start="12" data-line-end="13">Enter the project directory from your terminal and run.</p>
<pre><code class="has-line-data" data-line-start="15" data-line-end="18" class="language-sh">$ php artisan migrate:refresh --seed
$ php artisan serve
</code></pre>
<h1 class="code-line" data-line-start=18 data-line-end=19 ><a id="How_to_test_with_postman_or_another_18"></a>How to test with postman or another!</h1>
<p class="has-line-data" data-line-start="20" data-line-end="21">Actions Handled By Resource Controller</p>
<p class="has-line-data" data-line-start="22" data-line-end="23">For more details visit:</p>
<p class="has-line-data" data-line-start="24" data-line-end="26"><a href="https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller">https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller</a><br>
.</p>
<p class="has-line-data" data-line-start="27" data-line-end="28">Url that support GET, POST, PUT, PATCH, DELETE.</p>
<pre><code class="has-line-data" data-line-start="30" data-line-end="33" class="language-sh">/users
/buildings
</code></pre>
<h1 class="code-line" data-line-start=34 data-line-end=35 ><a id="User_Example_with_postman__34"></a>User Example with postman !</h1>
<pre><code class="has-line-data" data-line-start="37" data-line-end="56" class="language-sh"> New User -&gt; http POST /users

 WITH body parameters :
 - name
 - email
 - password

 Update Building : http PUT/PATCH /building/{id}

 note: the building id can be from <span class="hljs-number">1</span> to <span class="hljs-number">5</span>

  WITH body parameters :
 - name

 Destroy User : http DELETE /users/{id}

 note: the user id can be from <span class="hljs-number">1</span> to <span class="hljs-number">10</span>

</code></pre>
<h1 class="code-line" data-line-start=57 data-line-end=58 ><a id="Enter_a_user_to_a_building___57"></a>Enter a user to a building  !</h1>
<pre><code class="has-line-data" data-line-start="60" data-line-end="71" class="language-sh">Http POST /entries-out

 WITH body parameters :
 - fk_user_id       (int | from <span class="hljs-number">1</span> to <span class="hljs-number">10</span>)
 - fk_building_id   (int | from <span class="hljs-number">1</span> to <span class="hljs-number">5</span>)
 - action           (Boolean | <span class="hljs-number">0</span> = Entries and <span class="hljs-number">1</span> = Out)

 note:
 from <span class="hljs-number">1</span> to <span class="hljs-number">5</span> the fk_user_id are blocked so you will get a message.

</code></pre>
<p class="has-line-data" data-line-start="75" data-line-end="76"><strong>END !</strong></p>
