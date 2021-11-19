{{-- {!! Form::open(array('url'=>'UnidadSCH/Usuarios', 'method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} --}}
<form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                    <input type="text" name="searchText" class="form-control" placeholder="Buscar Test..." value="{{$searchText}}" style="background: white" >
                        <span class="input-group-btn">
                          <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="background-color: white">
                            <i class="fa fa-search"></i>
                          </button>
                        </span>
                  </div>
                </form>
{{-- {{Form::close()}} --}}
