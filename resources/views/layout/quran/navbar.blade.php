<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false"
            >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{
                url('/')
            }}">{{ config('app.name') }}</a>
        </div>
        <div
            class="collapse navbar-collapse"
            id="bs-example-navbar-collapse-1"
        >
            {{ Form::open([
                'id' => 'navigator',
                'class' => 'navbar-form navbar-right',
            ]) }}
            <form id="navigator" class="navbar-form navbar-right">
                <div class="form-group">
                    {{ Form::select(
                        'sura', $suras->pluck('title', 'id')
                        , $ayas->first()->sura_id
                        , [
                            'class' => 'form-control',
                        ]
                    ) }}
                </div>
                <div class="form-group">
                    {{ Form::select('aya_start', [], null, [
                        'class' => 'form-control',
                    ]) }}
                </div>
                <div class="form-group">
                    {{ Form::select('aya_end', [], null, [
                        'class' => 'form-control',
                    ]) }}
                </div>
                <div class="form-group">
                    <a
                        href="javascript:"
                        id="form-navigator"
                        class="btn btn-default btn-block"
                    >
                        <i class="fa fa-refresh"></i>
                    </a>
                </div>
            {{ Form::close() }}
            {{ Form::open([
                'id' => 'navigator',
                'class' => 'navbar-form navbar-right',
            ]) }}
            <form id="view-style" class="navbar-form navbar-right">
                <div class="form-group">
                    <a
                        href="javascript:"
                        class="btn btn-default bootstrap-colorpicker background"
                    >Background</a>
                </div>
                <div class="form-group">
                    <a
                        href="javascript:"
                        class="btn btn-default bootstrap-colorpicker text"
                    >Text</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</nav>
