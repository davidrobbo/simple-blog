<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware {


	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}



	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest()) {
			die('not logged in');
		}
		// dd($this->auth->getUser());
		if ($this->auth->user()->is_admin) {
			return redirect('home');
		}
		return $next($request);
	}

}
 