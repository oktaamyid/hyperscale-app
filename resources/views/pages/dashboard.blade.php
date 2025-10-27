@extends('layouts.app')

@section('title', 'Dashboard - HyperScale')
@section('description', 'Kelola proyek hosting Anda dengan mudah')

@section('content')
<div class="min-h-screen bg-gray-50" x-data="dashboardApp()">
    <!-- Dashboard Header -->
    <div class="bg-gradient-to-r from-primary-600 to-blue-600 text-white pb-12 pt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name ?? 'User' }}! 👋</h1>
                    <p class="text-blue-100">Kelola semua proyek hosting Anda di satu tempat</p>
                </div>
                <button @click="showNewProjectModal = true" 
                        class="bg-white text-primary-600 px-6 py-3 rounded-xl font-bold hover:bg-gray-100 transition-all shadow-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Deploy Proyek Baru
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Total Proyek</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1" x-text="projects.length">0</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-project-diagram text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Aktif</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1" x-text="activeProjects">0</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Total Deploy</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1" x-text="totalDeployments">0</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <i class="fas fa-rocket text-yellow-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Bandwidth</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-1">2.3 GB</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <button @click="showNewProjectModal = true" 
                        class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition-all">
                    <i class="fas fa-plus-circle text-primary-600 text-3xl mb-2"></i>
                    <span class="text-sm font-semibold text-gray-700">Deploy Baru</span>
                </button>
                <button class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all">
                    <i class="fas fa-database text-blue-600 text-3xl mb-2"></i>
                    <span class="text-sm font-semibold text-gray-700">Database</span>
                </button>
                <button class="flex flex-col items-center justify-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all">
                    <i class="fas fa-globe text-green-600 text-3xl mb-2"></i>
                    <span class="text-sm font-semibold text-gray-700">Domain</span>
                </button>
                <button class="flex flex-col items-center justify-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-all">
                    <i class="fas fa-chart-bar text-purple-600 text-3xl mb-2"></i>
                    <span class="text-sm font-semibold text-gray-700">Analytics</span>
                </button>
            </div>
        </div>

        <!-- Projects List -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Proyek Anda</h2>
                <div class="flex gap-2">
                    <button @click="viewMode = 'grid'" 
                            :class="viewMode === 'grid' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-600'"
                            class="px-4 py-2 rounded-lg transition-all">
                        <i class="fas fa-th"></i>
                    </button>
                    <button @click="viewMode = 'list'" 
                            :class="viewMode === 'list' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-600'"
                            class="px-4 py-2 rounded-lg transition-all">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Empty State -->
            <div x-show="projects.length === 0" class="text-center py-12">
                <div class="inline-block bg-gray-100 p-6 rounded-full mb-4">
                    <i class="fas fa-folder-open text-gray-400 text-6xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Proyek</h3>
                <p class="text-gray-600 mb-6">Mulai deploy proyek pertama Anda sekarang!</p>
                <button @click="showNewProjectModal = true" 
                        class="bg-primary-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-primary-700 transition-all">
                    <i class="fas fa-plus mr-2"></i>
                    Deploy Proyek Baru
                </button>
            </div>

            <!-- Grid View -->
            <div x-show="viewMode === 'grid' && projects.length > 0" 
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="project in projects" :key="project.id">
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-blue-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-code text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900" x-text="project.name"></h3>
                                    <p class="text-xs text-gray-500" x-text="project.type"></p>
                                </div>
                            </div>
                            <span :class="project.status === 'active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                                  class="px-2 py-1 rounded-full text-xs font-semibold">
                                <i :class="project.status === 'active' ? 'fas fa-check-circle' : 'fas fa-clock'"></i>
                                <span x-text="project.status === 'active' ? 'Active' : 'Building'"></span>
                            </span>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-globe w-5"></i>
                                <a :href="project.url" target="_blank" 
                                   class="text-blue-600 hover:underline truncate" x-text="project.url"></a>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="far fa-clock w-5"></i>
                                <span x-text="'Updated ' + project.updated"></span>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button @click="viewProject(project)" 
                                    class="flex-1 bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-all text-sm font-semibold">
                                <i class="fas fa-eye mr-1"></i>
                                View
                            </button>
                            <button @click="deleteProject(project.id)" 
                                    class="bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition-all text-sm font-semibold">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- List View -->
            <div x-show="viewMode === 'list' && projects.length > 0" class="space-y-4">
                <template x-for="project in projects" :key="project.id">
                    <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4 flex-1">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-blue-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-code text-white text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900" x-text="project.name"></h3>
                                    <div class="flex items-center gap-4 mt-1">
                                        <span class="text-sm text-gray-500" x-text="project.type"></span>
                                        <a :href="project.url" target="_blank" 
                                           class="text-sm text-blue-600 hover:underline" x-text="project.url"></a>
                                        <span class="text-sm text-gray-500" x-text="'Updated ' + project.updated"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span :class="project.status === 'active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                                      class="px-3 py-1 rounded-full text-xs font-semibold">
                                    <i :class="project.status === 'active' ? 'fas fa-check-circle' : 'fas fa-clock'"></i>
                                    <span x-text="project.status === 'active' ? 'Active' : 'Building'"></span>
                                </span>
                                <button @click="viewProject(project)" 
                                        class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-all text-sm font-semibold">
                                    <i class="fas fa-eye mr-1"></i>
                                    View
                                </button>
                                <button @click="deleteProject(project.id)" 
                                        class="bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition-all text-sm font-semibold">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- New Project Modal -->
    <div x-show="showNewProjectModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click.away="showNewProjectModal = false" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4"
         style="background-color: rgba(0, 0, 0, 0.3); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px);">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" 
             @click.stop
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Deploy Proyek Baru</h2>
                    <button @click="showNewProjectModal = false" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <form @submit.prevent="createProject" class="space-y-6">
                    <!-- Project Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Proyek <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               x-model="newProject.name"
                               placeholder="my-awesome-project"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- Project Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tipe Proyek <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <div @click="newProject.type = 'static'" 
                                 :class="newProject.type === 'static' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-file-code text-2xl text-primary-600"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Static Site</h4>
                                            <p class="text-xs text-gray-500">HTML, CSS, JS</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.type === 'static' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.type === 'static'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <div @click="newProject.type = 'nodejs'" 
                                 :class="newProject.type === 'nodejs' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fab fa-node-js text-2xl text-green-600"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Node.js</h4>
                                            <p class="text-xs text-gray-500">Express, Next.js</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.type === 'nodejs' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.type === 'nodejs'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <div @click="newProject.type = 'react'" 
                                 :class="newProject.type === 'react' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fab fa-react text-2xl text-blue-500"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">React</h4>
                                            <p class="text-xs text-gray-500">CRA, Vite</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.type === 'react' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.type === 'react'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <div @click="newProject.type = 'php'" 
                                 :class="newProject.type === 'php' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fab fa-php text-2xl text-purple-600"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">PHP</h4>
                                            <p class="text-xs text-gray-500">Laravel, WordPress</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.type === 'php' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.type === 'php'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deployment Method -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Metode Deploy <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-3">
                            <div @click="newProject.deployMethod = 'git'" 
                                 :class="newProject.deployMethod === 'git' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fab fa-github text-2xl text-gray-900"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Git Repository</h4>
                                            <p class="text-xs text-gray-500">Deploy dari GitHub, GitLab, atau Bitbucket</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.deployMethod === 'git' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.deployMethod === 'git'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>

                            <div @click="newProject.deployMethod = 'upload'" 
                                 :class="newProject.deployMethod === 'upload' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                 class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-upload text-2xl text-primary-600"></i>
                                        <div>
                                            <h4 class="font-bold text-gray-900">Upload Files</h4>
                                            <p class="text-xs text-gray-500">Upload file ZIP atau folder</p>
                                        </div>
                                    </div>
                                    <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                         :class="newProject.deployMethod === 'upload' ? 'border-primary-600' : 'border-gray-300'">
                                        <div x-show="newProject.deployMethod === 'upload'" 
                                             class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Git Repository URL (if git selected) -->
                    <div x-show="newProject.deployMethod === 'git'" x-transition>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Repository URL <span class="text-red-500">*</span>
                        </label>
                        <input type="url" 
                               x-model="newProject.gitUrl"
                               placeholder="https://github.com/username/repo.git"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>

                    <!-- File Upload (if upload selected) -->
                    <div x-show="newProject.deployMethod === 'upload'" x-transition>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Files <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary-400 transition-all cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-600 mb-2">Drag & drop files here or click to browse</p>
                            <p class="text-xs text-gray-500">Support: ZIP, TAR.GZ (max 100MB)</p>
                            <input type="file" class="hidden" accept=".zip,.tar.gz">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-3 pt-4">
                        <button type="button" 
                                @click="showNewProjectModal = false"
                                class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-all">
                            Batal
                        </button>
                        <button type="submit"
                                :disabled="isCreating"
                                :class="isCreating ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-700'"
                                class="flex-1 px-6 py-3 bg-primary-600 text-white rounded-xl font-bold transition-all">
                            <span x-show="!isCreating">
                                <i class="fas fa-rocket mr-2"></i>
                                Deploy Sekarang
                            </span>
                            <span x-show="isCreating">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Deploying...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function dashboardApp() {
    return {
        viewMode: 'grid',
        showNewProjectModal: false,
        isCreating: false,
        projects: [
            {
                id: 1,
                name: 'my-portfolio',
                type: 'Static Site',
                url: 'https://my-portfolio.hyperscale.app',
                status: 'active',
                updated: '2 hours ago'
            },
            {
                id: 2,
                name: 'blog-nextjs',
                type: 'Node.js',
                url: 'https://blog-nextjs.hyperscale.app',
                status: 'active',
                updated: '1 day ago'
            },
            {
                id: 3,
                name: 'e-commerce',
                type: 'React',
                url: 'https://e-commerce.hyperscale.app',
                status: 'building',
                updated: '5 minutes ago'
            }
        ],
        newProject: {
            name: '',
            type: 'static',
            deployMethod: 'git',
            gitUrl: ''
        },
        
        get activeProjects() {
            return this.projects.filter(p => p.status === 'active').length;
        },
        
        get totalDeployments() {
            return this.projects.length * 3; // Dummy calculation
        },
        
        viewProject(project) {
            alert(`Viewing project: ${project.name}\nURL: ${project.url}`);
            // Navigate to project detail page
            // window.location.href = `/dashboard/projects/${project.id}`;
        },
        
        deleteProject(projectId) {
            if (confirm('Are you sure you want to delete this project?')) {
                this.projects = this.projects.filter(p => p.id !== projectId);
            }
        },
        
        async createProject() {
            if (this.isCreating) return;
            
            this.isCreating = true;
            
            // Simulate API call
            setTimeout(() => {
                const newProject = {
                    id: this.projects.length + 1,
                    name: this.newProject.name,
                    type: this.newProject.type.charAt(0).toUpperCase() + this.newProject.type.slice(1),
                    url: `https://${this.newProject.name}.hyperscale.app`,
                    status: 'building',
                    updated: 'just now'
                };
                
                this.projects.unshift(newProject);
                this.showNewProjectModal = false;
                this.isCreating = false;
                
                // Reset form
                this.newProject = {
                    name: '',
                    type: 'static',
                    deployMethod: 'git',
                    gitUrl: ''
                };
                
                alert('Project deployment started! You will receive a notification when it\'s ready.');
            }, 2000);
        }
    }
}
</script>
@endsection
