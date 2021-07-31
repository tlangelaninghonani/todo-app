<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <title>CodeTodo</title>
</head>
<body>
    <div class="container">
        <span onclick="showElement('codetodonew', 'block')" class="material-icons-round add-codetodo">
            add
        </span>
        <div class="app-name-div">
            <div class="display-flex">
                <span class="material-icons-round app-name-icon">
                integration_instructions
                </span>
                <span class="app-name">CodeTodo</span>
            </div>
        </div>
        <p>
            @if(sizeof($codeTodo::where("completed", false)->get()) == 0)
                <p>
                    <span>CodeTodo</span>
                    <span>Completed</span>
                </p>
                <div class="text-align-center">
                    <span class="material-icons-round icon-large">
                    code
                    </span><br>
                    <span class="title">No CodeTodo</span><br>
                    <span class="title-small">Looks like it's not a busy week</span>
                </div>
            @else
                <p>
                    <input type="text" onkeydown="search(this.value)" placeholder="Search CodeTodo">
                </p>
                <!--<p>
                   <div class="display-flex-center nav">
                        <div class="display-flex">
                            <span class="material-icons-round">
                            integration_instructions
                            </span>
                            <span>CodeTodo</span>
                        </div>
                        <div class="display-flex">
                            <span class="material-icons-round">
                            event_available
                            </span>
                            <span>Completed</span>
                        </div>
                   </div>
                </p>-->
                <div id="codetododiv" class="codetodo-div">
                    @foreach($codeTodo::all() as $todo)
                        @if(! $todo->completed)
                            <div id="codetodonew{{ $todo->id }}" class="codetodo-edit">
                                <div class="display-flex-space-between">
                                    <div class="display-flex cl-coal">
                                        <span class="material-icons-round app-name-icon">
                                        integration_instructions
                                        </span>
                                        <span class="app-name">CodeTodo</span>
                                    </div>
                                    <span onclick="showElement('codetodonew{{ $todo->id }}', 'none')" class="material-icons-round ">
                                        close
                                    </span>
                                </div>
                                <form action="/codetodo/{{ $todo->id }}/edit" method="POST">
                                    @csrf
                                    @method("POST")
                                    <p>
                                        <span>CodeTodo title</span><br>
                                        <input type="text" name="title" id="title{{ $todo->id }}" placeholder="Enter CodeTodo title" value="{{ $todo->title }}" required>
                                    </p>
                                    @if($todo->description != "")
                                        <p>
                                            <span>CodeTodo description</span><br>
                                            <textarea name="description" id="description{{ $todo->id }}" cols="30" rows="10" placeholder="Enter CodeTodo description">{{ $todo->description }}"</textarea>
                                        </p>
                                    @endif
                                    <p>
                                        <button>Save CodeTodo</button>
                                    </p>
                                </form>
                            </div>
                            <div id="{{ $todo->title }}{{ $todo->id }}" class="codetodo cl-coal">
                                <p>
                                    <div class="display-flex">
                                        <div>
                                            <span class="material-icons-round schedule-icon">
                                            schedule
                                            </span>
                                        </div>
                                    <div>
                                            <span class="title">{{ $todo->title }}</span><br>
                                            <span class="title-small">{{ $todo->created_at }}</span>
                                    </div>
                                    </div>
                                </p>
                                @if($todo->description)
                                    <p>
                                        <div class="codetodo-description">
                                            <span class="title-small">{{ $todo->description }}</span>
                                        </div>
                                    </p>
                                @endif
                                <p>
                                    <div class="display-flex">
                                        <form id="completeform{{ $todo->id }}" action="/codetodo/{{ $todo->id }}/complete" method="POST">
                                            @csrf
                                            @method("POST")
                                        </form>
                                        <div class="display-flex" onclick="formSubmit('completeform{{ $todo->id }}')">
                                            <span class="material-icons-round">
                                            event_available
                                            </span>
                                            <span>Complete</span>
                                        </div>
                                        <div class="display-flex" onclick="showElement('codetodonew{{ $todo->id }}', 'block')" >
                                            <span class="material-icons-round">
                                            edit
                                            </span>
                                            <span>Edit</span>
                                        </div>
                                        <form id="deleteform{{ $todo->id }}" action="/codetodo/{{ $todo->id }}/delete" method="POST">
                                            @csrf
                                            @method("POST")
                                        </form>
                                        <div class="display-flex" onclick="formSubmit('deleteform{{ $todo->id }}')">
                                            <span class="material-icons-round">
                                            delete
                                            </span>
                                            <span>Delete</span>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <p>
                                <hr>
                            </p>
                        @endif
                    @endforeach
                </div>
            @endif
            <div id="codetodonew" class="codetodo-new">
                <div class="display-flex-space-between">
                    <div class="display-flex cl-coal">
                        <span class="material-icons-round app-name-icon">
                        integration_instructions
                        </span>
                        <span class="app-name">CodeTodo</span>
                    </div>
                    <span onclick="showElement('codetodonew', 'none')" class="material-icons-round ">
                        close
                    </span>
                </div>
                <form action="/codetodo/new" method="POST">
                    @csrf
                    @method("POST")
                    <p>
                        <span>CodeTodo title</span><br>
                        <input type="text" name="title" id="title" placeholder="Enter CodeTodo title" required>
                    </p>
                    <p>
                        <span>CodeTodo description</span><br>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter CodeTodo description"></textarea>
                    </p>
                    <p>
                        <button>Add CodeTodo</button>
                    </p>
                </form>
            </div>
        </p>
    </div>
    <script src="{{ $links['js'] }}"></script>
</body>
</html>