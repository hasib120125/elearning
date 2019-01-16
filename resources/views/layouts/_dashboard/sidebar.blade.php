<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      @role('admin|quiz-admin|follow-admin')
      <li>
        <a href="{{ url('/') }}">
            <i class="fa fa-columns"></i> <span>Dashboard</span>
          </a>
      </li>

      <li class="treeview">
        <a href="#">
            <i class="fa fa-question-circle"></i>
            <span>Question Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li class="{{{ Request::is('question-categories')? 'active' : ''}}}">
            <a href="{{ route('question-categories.index') }}">
                    <i class="fa fa-cubes"></i>
                    <span>Question Categories</span>
                </a>
          </li>
          <li class="{{{ Request::is('questions')? 'active' : ''}}}">
            <a href="{{ route('questions.index') }}">
                    <i class="fa fa-question"></i>
                    <span>Questions</span>
                </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-etsy"></i>
          <span>Exam Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('exams.index') }}">
              <i class="fa fa-question"></i>
              <span>Exams</span>
            </a>
          </li>
          <li>
            <a href="{{ route('exams.assign') }}">
              <i class="fa fa-paperclip"></i>
              <span>Assign Exam</span>
            </a>
          </li>
          <li>
            <a href="{{ route('exams.status') }}">
              <i class="fa fa-bar-chart"></i>
              <span>Assigned Exam Status</span>
            </a>
          </li>
        </ul>
      </li>
      @role('admin|follow-admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-etsy"></i>
          <span>Class Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('courses.index') }}">
              <i class="fa fa-question"></i>
              <span>Courses</span>
            </a>
          </li>
          <li>
            <a href="{{ route('course-user.assign') }}">
              <i class="fa fa-question"></i>
              <span>Assign Courses</span>
            </a>
          </li>
          <li>
            <a href="{{ route('course-user.assign-liveclass') }}">
              <i class="fa fa-question"></i>
              <span>Assign Liveclass</span>
            </a>
          </li>
          <li>
            <a href="{{route('course-user.status')}}">
              <i class="fa fa-bars"></i>
              <span>Assigned Courses Status</span>
            </a>
          </li>
          <li>
            <a href="{{ route('skills.index') }}">
              <i class="fa fa-question"></i>
              <span>Skills</span>
            </a>
          </li>
        </ul>
      </li>
      @endrole
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('reports.exam-result')}}">
              <i class="fa fa-question"></i>
              <span>Exam Results</span>
            </a>
          </li>
          <li>
            <a href="{{ route('reports.user-result') }}">
              <i class="fa fa-paperclip"></i>
              <span>User Results</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ route('divisions.index') }}">
                  <i class="fa fa-object-group"></i>
                  <span>Divisions</span>
              </a>
          </li>
          <li>
            <a href="{{ route('departments.index') }}">
                  <i class="fa fa-bars"></i>
                  <span>Departments</span>
              </a>
          </li>
          <li>
            <a href="{{ route('units.index') }}">
                  <i class="fa fa-cubes"></i>
                  <span>Units</span>
              </a>
          </li>

          <li>
            <a href="{{ route('groups.index') }}">
              <i class="fa fa-users"></i>
              <span>Groups</span>
          </a>
          </li>
          <li>
            <a href="{{ route('teams.index') }}">
              <i class="fa fa-users"></i>
              <span>Teams</span>
          </a>
          </li>
          <li class="{{{ Request::is('users') || (Request::is('users/edit/*') && !Request::is('users/edit/bulk'))? 'active' : ''}}}">
            <a href="{{ route('users.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                  </a>
          </li>
        </ul>
      </li>
      <li>
          <a href="{{ route('settings.index')}}">
              <i class="fa fa-cog"></i>
              <span>Settings</span>
          </a>
      </li>
      @endrole
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
