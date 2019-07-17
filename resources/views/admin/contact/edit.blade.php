@extends('layouts.admin_layout')

@section('admin_content')


<div class="row">
      <div class="col-12 m-t-30">

      <div id="code2" class="collapse highlight">
          <pre class="prettyprint"><code class="language-html" data-lang="html">
          <span class="nt">&lt;div</span>
          <span class="na">class=</span>
          <span class="s">"card"</span>
          <span class="nt">&gt;</span>
          <span class="nt">&lt;div</span>
          <span class="na">class=</span>
          <span class="s">"card-header"</span>
          <span class="nt">&gt;</span>
                  Add Slider
          <span class="nt">&lt;/div&gt;</span>
          <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
          <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Special title treatment<span class="nt">&lt;/h4&gt;</span>
          <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>With supporting text below as a natural lead-in to additional content.<span class="nt">&lt;/p&gt;</span>
          <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
                             <span class="nt">&lt;/div&gt;</span>
                           <span class="nt">&lt;/div&gt;</span></code>
                           </pre>
                       </div>
                       <!-- Card -->
              <div class="card">
              <div class="card-header">
                               Featured
            </div>
              <div class="card-body">
              <form class="" action="{{route('category.update',$category->id)}}" method="post" >
                @csrf
                @method('PUT')
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-success" name="button">save</button>
                  </form>
                 </div>
             </div>
                       <!-- Card -->
                   </div>
               </div>
               <!-- End Row -->


@endsection
