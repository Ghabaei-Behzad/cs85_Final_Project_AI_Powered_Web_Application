<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Blog Assistant</title>
    <!--script src="https://jsdelivr.net"></!--script-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800"> AI Blog Assistant</h1>

        <!-- Form Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success Notification -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Input Form -->
        <form action="{{ route('blogs.generate') }}" method="POST" class="bg-white p-6 rounded shadow mb-8">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Blog Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border rounded" placeholder="i.e., The Future of Laravel in 2026" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Keywords / Focus (Optional)</label>
                <input type="text" name="keywords" value="{{ old('keywords') }}" class="w-full p-2 border rounded" placeholder="i.e., AI integration, clean code, productivity">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Generate Blog Draft</button>
        </form>

        <!-- Display Generated Blogs -->
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Your Generated Blogs</h2>
        @if($blogs->isEmpty())
            <p class="text-gray-500">No blogs generated yet. Write a title above to start!</p>
        @else
            <div class="space-y-6">
                @foreach($blogs as $blog)
                    <div class="bg-white p-6 rounded shadow">
                        <h3 class="text-xl font-bold text-blue-600 mb-2">{{ $blog->title }}</h3>
                        <p class="text-xs text-gray-400 mb-4">Generated on {{ $blog->created_at->format('M d, Y') }}</p>
                        <div class="prose max-w-none text-gray-700">
                            {!! $blog->content !!}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
