@extends('layouts.app')

@section('content')

    <div class = "card">
        <div class = "card-header">Мои сохраненные документы</div>

        <div class = "card-body">

            <div class="my-4">
                <form method="GET" action="{{ route('my-docs.index') }}" class="form-row justify-content-end align-items-end">

                    <div class="mx-1">
                        <input type="date" value="{{ request()->created_at }}" class="form-control" name="created_at" autocomplete="off">
                    </div>

                    <div class="mx-1">
                        <select name="template_id" class="form-control">
                            <option value="">Тип документа</option>
                            @foreach(\App\Models\Template::getForList() as $template)
                                <option @if(request()->template_id == $template->id) selected @endif value="{{ $template->id}}">{{ $template->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mx-1">
                        <select name="orderBy" class="form-control">
                            <option value="">Сначала новые</option>
                            <option @if(request()->orderBy) selected @endif value="1">Сначала старые</option>
                        </select>
                    </div>

                    <button class="btn btn-primary mx-1">Применять</button>
                </form>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Создан в</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($documents as $document)
                <tr>
                    <th scope="row">{{ $document->id }}</th>
                    <td>{{ $document->template->name }}</td>
                    <td>{{ $document->created_at->format('d-M-Y H:i') }}</td>
                    <td class="text-right">
                        <a href="{{ route('my-docs.download', $document->id) }}" class="btn btn-success mx-1">Скачать</a>
                        <a href="{{ route('my-docs.edit', $document->id) }}" class="btn btn-warning mx-1">Редактировать</a>
                        <a href="{{ route('my-docs.print', $document->id) }}" class="btn btn-info mx-1">Печатать</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Документы не найдены</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $documents->links() }}
            </div>
        </div>
    </div>

@endsection
