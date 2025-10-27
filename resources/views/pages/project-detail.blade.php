@extends('layouts.app')

@section('title', 'Project Details - HyperScale')
@section('description', 'Kelola detail proyek hosting Anda')

@section('content')
<div class="min-h-screen bg-gray-50 py-8" x-data="projectDetail()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" class="text-primary-600 hover:text-primary-700 font-semibold mb-4 inline-block">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Dashboard
            </a>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-blue-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-code text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900" x-text="project.name"></h1>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-check-circle"></i>
                                Active
                            </span>
                            <a :href="project.url" target="_blank" class="text-blue-600 hover:underline text-sm" x-text="project.url"></a>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button @click="deployProject" 
                            :disabled="isDeploying"
                            :class="isDeploying ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-700'"
                            class="bg-primary-600 text-white px-6 py-3 rounded-xl font-bold transition-all">
                        <i :class="isDeploying ? 'fas fa-spinner fa-spin' : 'fas fa-rocket'" class="mr-2"></i>
                        <span x-text="isDeploying ? 'Deploying...' : 'Redeploy'"></span>
                    </button>
                    <button class="bg-red-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-red-700 transition-all">
                        <i class="fas fa-trash mr-2"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button @click="activeTab = 'overview'" 
                            :class="activeTab === 'overview' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-4 px-6 border-b-2 font-semibold text-sm transition-all">
                        <i class="fas fa-chart-line mr-2"></i>
                        Overview
                    </button>
                    <button @click="activeTab = 'deployments'" 
                            :class="activeTab === 'deployments' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-4 px-6 border-b-2 font-semibold text-sm transition-all">
                        <i class="fas fa-history mr-2"></i>
                        Deployments
                    </button>
                    <button @click="activeTab = 'settings'" 
                            :class="activeTab === 'settings' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-4 px-6 border-b-2 font-semibold text-sm transition-all">
                        <i class="fas fa-cog mr-2"></i>
                        Settings
                    </button>
                    <button @click="activeTab = 'domains'" 
                            :class="activeTab === 'domains' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-4 px-6 border-b-2 font-semibold text-sm transition-all">
                        <i class="fas fa-globe mr-2"></i>
                        Domains
                    </button>
                    <button @click="activeTab = 'analytics'" 
                            :class="activeTab === 'analytics' ? 'border-primary-600 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-4 px-6 border-b-2 font-semibold text-sm transition-all">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Analytics
                    </button>
                </nav>
            </div>
        </div>

        <!-- Tab Content -->
        <div>
            <!-- Overview Tab -->
            <div x-show="activeTab === 'overview'" x-transition>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Quick Stats -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="text-gray-500 text-sm font-semibold mb-1">Deployments</div>
                                <div class="text-3xl font-bold text-gray-900">42</div>
                                <div class="text-green-600 text-sm mt-1">
                                    <i class="fas fa-arrow-up"></i> 12% this month
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="text-gray-500 text-sm font-semibold mb-1">Uptime</div>
                                <div class="text-3xl font-bold text-gray-900">99.9%</div>
                                <div class="text-green-600 text-sm mt-1">
                                    <i class="fas fa-check-circle"></i> Excellent
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="text-gray-500 text-sm font-semibold mb-1">Bandwidth</div>
                                <div class="text-3xl font-bold text-gray-900">1.2 GB</div>
                                <div class="text-blue-600 text-sm mt-1">
                                    <i class="fas fa-chart-line"></i> 40% used
                                </div>
                            </div>
                        </div>

                        <!-- Latest Deployment -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Latest Deployment</h3>
                            <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="bg-green-500 w-2 h-2 rounded-full"></span>
                                            <span class="font-bold text-gray-900">Production</span>
                                            <span class="text-xs text-gray-500">#47</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Updated homepage design</p>
                                        <div class="flex items-center gap-4 text-xs text-gray-500">
                                            <span><i class="fas fa-code-branch mr-1"></i> main</span>
                                            <span><i class="far fa-clock mr-1"></i> 2 hours ago</span>
                                            <span><i class="fas fa-user mr-1"></i> john@example.com</span>
                                        </div>
                                    </div>
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-check mr-1"></i>
                                        Success
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Build Logs -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Recent Build Logs</h3>
                            <div class="bg-gray-900 rounded-xl p-4 text-green-400 font-mono text-xs overflow-x-auto">
<pre class="whitespace-pre-wrap">
[2024-01-27 10:30:15] Building project...
[2024-01-27 10:30:16] Installing dependencies...
[2024-01-27 10:30:22] ✓ Dependencies installed successfully
[2024-01-27 10:30:23] Running build script...
[2024-01-27 10:30:45] ✓ Build completed successfully
[2024-01-27 10:30:46] Deploying to production...
[2024-01-27 10:30:52] ✓ Deployment successful
[2024-01-27 10:30:53] Your project is now live at: https://my-portfolio.hyperscale.app
</pre>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Project Info -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Project Info</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Framework:</span>
                                    <span class="font-semibold text-gray-900">Static Site</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Created:</span>
                                    <span class="font-semibold text-gray-900">Jan 15, 2024</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Last Deploy:</span>
                                    <span class="font-semibold text-gray-900">2 hours ago</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Build Time:</span>
                                    <span class="font-semibold text-gray-900">38s</span>
                                </div>
                            </div>
                        </div>

                        <!-- Environment Variables -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Environment</h3>
                            <div class="space-y-2">
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-xs text-gray-500">NODE_ENV</div>
                                    <div class="font-mono text-sm text-gray-900">production</div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-xs text-gray-500">API_URL</div>
                                    <div class="font-mono text-sm text-gray-900">https://api.example.com</div>
                                </div>
                            </div>
                            <button class="mt-4 w-full bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-all text-sm font-semibold">
                                <i class="fas fa-plus mr-2"></i>
                                Add Variable
                            </button>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                            <div class="space-y-2">
                                <button class="w-full bg-blue-50 text-blue-700 px-4 py-3 rounded-lg hover:bg-blue-100 transition-all text-sm font-semibold text-left">
                                    <i class="fas fa-download mr-2"></i>
                                    Download Source
                                </button>
                                <button class="w-full bg-purple-50 text-purple-700 px-4 py-3 rounded-lg hover:bg-purple-100 transition-all text-sm font-semibold text-left">
                                    <i class="fas fa-code-branch mr-2"></i>
                                    View Repository
                                </button>
                                <button class="w-full bg-green-50 text-green-700 px-4 py-3 rounded-lg hover:bg-green-100 transition-all text-sm font-semibold text-left">
                                    <i class="fas fa-terminal mr-2"></i>
                                    SSH Access
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deployments Tab -->
            <div x-show="activeTab === 'deployments'" x-transition>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Deployment History</h3>
                    <div class="space-y-4">
                        <template x-for="deployment in deployments" :key="deployment.id">
                            <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <span class="font-bold text-gray-900" x-text="'#' + deployment.id"></span>
                                            <span :class="deployment.status === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
                                                  class="px-2 py-1 rounded-full text-xs font-semibold">
                                                <i :class="deployment.status === 'success' ? 'fas fa-check' : 'fas fa-times'"></i>
                                                <span x-text="deployment.status"></span>
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2" x-text="deployment.message"></p>
                                        <div class="flex items-center gap-4 text-xs text-gray-500">
                                            <span><i class="fas fa-code-branch mr-1"></i><span x-text="deployment.branch"></span></span>
                                            <span><i class="far fa-clock mr-1"></i><span x-text="deployment.time"></span></span>
                                            <span><i class="fas fa-user mr-1"></i><span x-text="deployment.author"></span></span>
                                        </div>
                                    </div>
                                    <button class="text-primary-600 hover:text-primary-700 text-sm font-semibold">
                                        View Logs
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div x-show="activeTab === 'settings'" x-transition>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Project Settings</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Project Name</label>
                            <input type="text" x-model="project.name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Build Command</label>
                            <input type="text" value="npm run build" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Output Directory</label>
                            <input type="text" value="dist" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono text-sm">
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="bg-primary-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-primary-700 transition-all">
                                Save Changes
                            </button>
                            <button type="button" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-300 transition-all">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Domains Tab -->
            <div x-show="activeTab === 'domains'" x-transition>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Custom Domains</h3>
                        <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-all text-sm font-semibold">
                            <i class="fas fa-plus mr-2"></i>
                            Add Domain
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-bold text-gray-900">my-portfolio.hyperscale.app</div>
                                    <div class="text-sm text-gray-500">Default domain</div>
                                </div>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i class="fas fa-check-circle"></i>
                                    Active
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab -->
            <div x-show="activeTab === 'analytics'" x-transition>
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Analytics Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gray-900">12,458</div>
                            <div class="text-gray-500 text-sm">Page Views</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gray-900">3,241</div>
                            <div class="text-gray-500 text-sm">Unique Visitors</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gray-900">2m 34s</div>
                            <div class="text-gray-500 text-sm">Avg. Session</div>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl p-8 text-center">
                        <i class="fas fa-chart-line text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-600">Analytics chart akan ditampilkan di sini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function projectDetail() {
    return {
        activeTab: 'overview',
        isDeploying: false,
        project: {
            name: 'my-portfolio',
            url: 'https://my-portfolio.hyperscale.app',
            status: 'active'
        },
        deployments: [
            { id: 47, status: 'success', message: 'Updated homepage design', branch: 'main', time: '2 hours ago', author: 'john@example.com' },
            { id: 46, status: 'success', message: 'Fixed mobile responsive', branch: 'main', time: '1 day ago', author: 'john@example.com' },
            { id: 45, status: 'success', message: 'Added contact form', branch: 'main', time: '2 days ago', author: 'john@example.com' },
            { id: 44, status: 'failed', message: 'Build error', branch: 'develop', time: '3 days ago', author: 'john@example.com' },
            { id: 43, status: 'success', message: 'Initial deployment', branch: 'main', time: '1 week ago', author: 'john@example.com' }
        ],
        
        deployProject() {
            if (this.isDeploying) return;
            
            this.isDeploying = true;
            
            setTimeout(() => {
                this.isDeploying = false;
                alert('Deployment started! You will receive a notification when it\'s ready.');
            }, 2000);
        }
    }
}
</script>
@endsection
