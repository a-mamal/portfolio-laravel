<x-app-layout>
    <div class="project-form-container">

        <h1 class="project-form-title">Create New Project</h1>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST" class="project-form">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom:10px;">
                <label>Highlights (one per line)</label><br>
                <textarea name="highlights_text" rows="5" style="width:100%;">{{ old('highlights_text') }}</textarea>
                @error('highlights_text') <div style="color:red;">{{ $message }}</div> @enderror
            </div>


            <div class="form-group">
                <label>Project URL</label>
                <input type="url" name="project_url" value="{{ old('project_url') }}">
                @error('project_url')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}">
                @error('github_url')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status')=='published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">Create Project</button>
        </form>

    </div>
</x-app-layout>
