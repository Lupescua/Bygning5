@extends('layouts.layout')
@section('title')

@endsection
@section('content')
    <main role="main">
    
        @include ('layouts.carousel')



        <!-- Marketing messaging and featurettes
      ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Five columns of text below the carousel -->
            <!-- The 5 circles of the building -->
          
            @include ('layouts.circles')
          
            <!-- START THE FEATURETTES -->
            <!-- Each thing separated -->

            @include ('layouts.featurette')

            <!-- /END THE FEATURETTES -->

        </div>
        <!-- /.container -->


        <!-- FOOTER -->
        @include ('layouts.footer')

    </main>
    
@endsection


