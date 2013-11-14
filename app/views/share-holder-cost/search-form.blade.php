<!-- Search form share-holder-cost -->
<div class="row-fluid show-grid">
    <div class="span12">
        <form method="GET" action="/share-holder-cost/search" class="form-search well well-small">
            <input type="text" value="{{ $keywords }}" name="kw" class="w-min"> 
            <select name="col" class="input w-min">
				@foreach ($options as $k => $v)
					<option value="{{ $k }}">{{ MyLang::out($v) }}</option>
				@endforeach
			</select>
            
            <button class="btn btn-primary" type="submit">
                <i class="icon-search icon-white"></i>
            </button>

            <div class="pull-right">
                <a href="/share-holder-cost/create" class="btn btn-success">
                    <i class="icon-plus icon-white"></i>
                </a>
            </div>
        </form>
    </div>
</div>