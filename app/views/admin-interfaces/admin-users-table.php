

<div class="admin-home">
<div class="admin-title">Users</div>
<div class="admin-subsection-1">
    <div class="admin-sub-title">
        <div class="user-create-bt">
            <button class="center">
                <div class="bt-name" id="show-login">Add User</div>
            </button>
        </div>
        <div class="profile-message">

            <?php if(message()):?>
            <div class="error"><?=message('',true)?></div>
            <?php endif;?>
        </div>
        <div class="container">
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">User</div>
                    <div class="col col-2">Role</div>
                    <div class="col col-3">Username</div>
                    <div class="col col-4">Password</div>
                    <div class="col col-5">Email</div>
                    <div class="col col-6"></div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                    <div class="col col-2" data-label="Role">DR</div>
                    <div class="col col-3" data-label="User Name">DR001</div>
                    <div class="col col-4" data-label="Pasword">********</div>
                    <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                    <div class="col col-6">
                        <div class="user-delete" id="delete-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                fill="none">
                                <path
                                    d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                    stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="user-update" id="show-update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <g clip-path="url(#clip0_1448_1971)">
                                    <path
                                        d="M14.168 2.49993C14.3868 2.28106 14.6467 2.10744 14.9326 1.98899C15.2186 1.87054 15.5251 1.80957 15.8346 1.80957C16.1442 1.80957 16.4507 1.87054 16.7366 1.98899C17.0226 2.10744 17.2824 2.28106 17.5013 2.49993C17.7202 2.7188 17.8938 2.97863 18.0122 3.2646C18.1307 3.55057 18.1917 3.85706 18.1917 4.16659C18.1917 4.47612 18.1307 4.78262 18.0122 5.06859C17.8938 5.35455 17.7202 5.61439 17.5013 5.83326L6.2513 17.0833L1.66797 18.3333L2.91797 13.7499L14.168 2.49993Z"
                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1448_1971">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                    <div class="col col-2" data-label="Role">DR</div>
                    <div class="col col-3" data-label="User Name">DR001</div>
                    <div class="col col-4" data-label="Pasword">********</div>
                    <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                    <div class="col col-6">
                        <div class="user-delete" id="delete-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                fill="none">
                                <path
                                    d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                    stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="user-update" id="show-update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <g clip-path="url(#clip0_1448_1971)">
                                    <path
                                        d="M14.168 2.49993C14.3868 2.28106 14.6467 2.10744 14.9326 1.98899C15.2186 1.87054 15.5251 1.80957 15.8346 1.80957C16.1442 1.80957 16.4507 1.87054 16.7366 1.98899C17.0226 2.10744 17.2824 2.28106 17.5013 2.49993C17.7202 2.7188 17.8938 2.97863 18.0122 3.2646C18.1307 3.55057 18.1917 3.85706 18.1917 4.16659C18.1917 4.47612 18.1307 4.78262 18.0122 5.06859C17.8938 5.35455 17.7202 5.61439 17.5013 5.83326L6.2513 17.0833L1.66797 18.3333L2.91797 13.7499L14.168 2.49993Z"
                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1448_1971">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </li>

                <li class="table-row">
                    <div class="col col-1" data-label="User">S.D. Saman Perera</div>
                    <div class="col col-2" data-label="Role">DR</div>
                    <div class="col col-3" data-label="User Name">DR001</div>
                    <div class="col col-4" data-label="Pasword">********</div>
                    <div class="col col-5" data-label="Email">saman12@gamil.com</div>
                    <div class="col col-6">
                        <div class="user-delete" id="delete-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                fill="none">
                                <path
                                    d="M1.5 4.99984H3.16667M3.16667 4.99984H16.5M3.16667 4.99984V16.6665C3.16667 17.1085 3.34226 17.5325 3.65482 17.845C3.96738 18.1576 4.39131 18.3332 4.83333 18.3332H13.1667C13.6087 18.3332 14.0326 18.1576 14.3452 17.845C14.6577 17.5325 14.8333 17.1085 14.8333 16.6665V4.99984H3.16667ZM5.66667 4.99984V3.33317C5.66667 2.89114 5.84226 2.46722 6.15482 2.15466C6.46738 1.8421 6.89131 1.6665 7.33333 1.6665H10.6667C11.1087 1.6665 11.5326 1.8421 11.8452 2.15466C12.1577 2.46722 12.3333 2.89114 12.3333 3.33317V4.99984M7.33333 9.1665V14.1665M10.6667 9.1665V14.1665"
                                    stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="user-update" id="show-update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <g clip-path="url(#clip0_1448_1971)">
                                    <path
                                        d="M14.168 2.49993C14.3868 2.28106 14.6467 2.10744 14.9326 1.98899C15.2186 1.87054 15.5251 1.80957 15.8346 1.80957C16.1442 1.80957 16.4507 1.87054 16.7366 1.98899C17.0226 2.10744 17.2824 2.28106 17.5013 2.49993C17.7202 2.7188 17.8938 2.97863 18.0122 3.2646C18.1307 3.55057 18.1917 3.85706 18.1917 4.16659C18.1917 4.47612 18.1307 4.78262 18.0122 5.06859C17.8938 5.35455 17.7202 5.61439 17.5013 5.83326L6.2513 17.0833L1.66797 18.3333L2.91797 13.7499L14.168 2.49993Z"
                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1448_1971">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

