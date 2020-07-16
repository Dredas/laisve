@extends(backpack_view('blank'))

@php
    $userCount = App\User::count();

	$widgets['before_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets
	        [
			    'type'        	=> 'progress_white',
			    'class'       	=> 'card mb-2',
	     		'progressClass'	=> 'progress-bar bg-primary',
			    'value'       	=> $userCount,
			    'description' 	=> 'Vartotojų.',
			    'progress'    	=> (int)$userCount/10*100, // integer
			],
	  ]
	];

     $widgets['before_content'][] = [
         'type'        => 'jumbotron',
         'wrapperClass'=> 'shadow-xs',
         'heading'     => trans('backpack::base.welcome'),
         'content'     => 'Laisvės partija yra pažangiausia partija Lietuvoje!',
         'button_link' => backpack_url('logout'),
         'button_text' => trans('backpack::base.logout'),
     ];

@endphp
@section('content')
@endsection
