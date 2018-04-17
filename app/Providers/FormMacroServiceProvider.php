<?php
/**
 * Created by PhpStorm.
 * User: Sabin
 * Date: 22/12/2017
 * Time: 12:32 PM
 */

namespace App\Providers;

//use Collective\Html\HtmlServiceProvider;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as Form;

class FormMacroServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot(){
		Form::macro('labelWithHtml',function ($name,$html,$attr){
			return '<label for="'.$name.'" class="'.$attr.'">'.$html.'</label>';
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {

	}
}