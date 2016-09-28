# FSU CS Club Bootcamp - Git

## Getting started

### Clone this repo (repository)

First lets clone this repo so we can begin the tutorial. Open the terminal 
(Command Prompt for you Windows folks) and change directories to some where on 
your computer you want to save your work. For me, it's the Freelance directory 
in my home folder:

```bash
$ cd Freelance
$ git clone https://github.com/nathandentzau/fsu-bootcamp-git.git
```

Git should have downloaded (cloned) the repository on Github to your computer.
Now lets change directories to the `fsu-bootcamp-git` directory to begin:

```bash
$ cd fsu-bootcamp-git
```

And then list the files in the current working directory:

```bash
$ ls
```

... or the following for you on Windows:

```bash
$ dir
```

Nice. You just cloned a repo! :thumbs_up:

## Branches

A branch in Git is simply a lightweight movable pointer to any number of commits. 
The default branch name in Git is `master`. As you initially make commits, you’re 
given a master branch that points to the last commit you made. Every time you 
commit, it moves forward automatically
([Source](https://git-scm.com/book/en/v1/Git-Branching-What-a-Branch-Is)).

### Create a branch 

For me, the easiest way to create a branch is to use the git function `checkout`
because when I create a new branch I also want to be in that new branch after I
have created it:

```bash
$ git checkout -b [BRANCH_NAME]
```

Obviously we'd replace `[BRANCH_NAME]` with what we'd actually call our branch.
For now lets create a new branch named `[YOURNAME]/my-first-branch`. Here 
replace `[YOURNAME]` with your full name with no spaces. 

I find this naming convention is helpful because when I'm working with other 
people on a project I can quickly see who created which branches. For me, this 
is what I would do to create my branch:

```bash
$ git checkout -b nathandentzau/my-first-branch
```

It's important to note that your branch name must have no spaces and if you
want to "concatenate" any words, do so with `-`'s. 

Nice. You just created a branch!

**Tip: You can check what branches are in a repo by typing:**

```bash
$ git branch
```

The branch with the `*` next to its name is the branch you're in (or checked 
out)! :thumbs_up:

### Staging files for commit

In order to write history to our repo we have to select files or sections of 
files to change. To see what files have changes in your branch from the last 
commit:

```bash
$ git status
```

Because we just created this branch, there should be no files to stage. Lets 
create some files, make 2 files `[YOURNAME].txt` and `HelloWorld.php`. In 
`[YOURNAME].txt` put anything you want in the file, but for `HelloWorld.php` 
copy exactly the following:

```php
<?php

namespace This\Is\A\NameSpace;

use This\Is\Also\A\NameSpace\Controller;

class HelloWorld extends Controller {

  protected $greeting;
    
  public function __construct(string $greeting = '') {
    $this->greeting = $greeting.
  }

  public function getGreeting(): string {
    return $this->greeting;
  }

  public function setGreeting(string $greeting): void {
    $this->greeting = $greeting;
  }

}
```

Make sure to save both of these files. Now lets check the status of changes in
our repo:

```bash
$ git status
```

You should see that you have two new files that can be stagged for commit. Nice!

### Making commits

Okay, so we record the history of our project in our repo with commits. These 
are checkpoints for our project when we add, edit or remove something. The 
great thing about commits is that majority of the time you can rollback (revert
or reset) your files back to a previous commit. 

However in order to have commits to roll back to, we have to make commits and 
make them often. Majority of the time, a single commit should be grouped with 
changes that are like kind. For example, the contents of `[YOURNAME].txt` and
`HelloWorld.php` are completely different. Because these two files are 
unrelated, We should put them in their own commits that have names with a 
purposeful meaning *(Note: You can and should commit multiple files/changes if 
they are related to each other in some way, don't make seperate commits for each
file just because)*.

By splitting these changes up in their own commits, it gives us more 
opportunities to revert a change we made down the road. 

In order to commit a change we need to stage our changes to be committed. You 
can add changes by filename:

```bash
$ git add HelloWorld.php
```

**Tip: You can also add changes in chunks. For instance if `HelloWorld.php` 
already existed and we just made a one line change to the file, we can add just 
that one line to be staged:**

```bash
$ git add -up
```

This will run through all the line (or blocks of code) that were changed.

After you have added your files to be staged for commit you can check if they 
were added by running `git status` again. Now that we have staged our changes to 
be committed, lets commit them!

```bash
$ git commit -m "Add the HelloWorld.php file"
```

If you run `git status` again you will see that there are no longer files
staged for commit. You can also see your commit by checking the commit log:

```bash
$ git log
```

**Tip: Commit messages should be simple, concise and clear. The message should 
also bewritten in present tense (no "Added" or "Adding").**

Now lets stage `[YOURNAME].txt` to be commited and then commit the changes. Make
sure to create a proper commit message!

### Pushing changes to a remote repository

So when we cloned this repository from Github, git was smart enough to store
information about where we downloaded the repo from. By default where we cloned
our repo from will be aliased as `origin` for our remote destination.

So lets push our branches to Github:

```bash
$ git push origin [YOURNAME]/my-first-branch
```

You'll be prompted for your credentials and then your branch will upload. Go to
the repo on Github and check if your branch appeared.

## Merging

### Local merges

So we just made changes in a new branch that was built off of master. We did 
this because it's safer to make changes in a separate branch other than master.
In order to get those changes into master we can easily merge out changes:

```bash
$ git checkout master
$ git merge [YOURNAME]/my-first-branch
```

We switched to the master branch and then told Git to merge our changes from
`[YOURNAME]/my-first-branch` into `master`. Nice.

### Remote merges

So if you merged locally into master and tried to push your changes in master
to this repo it will fail. Why? I'm not giving the whole world permissions to 
edit my stuff! But I'm selfish and I want people to help me. So welcome pull 
requests. Pull requests on Github allow anyone to open a request to pull in
changes into your master branch (or any branch you choose), but those changes will
only be merged if you approve them. 

Go to [Branches](https://github.com/nathandentzau/fsu-bootcamp-git/branches) and
find your branch. To the right click the New pull request button. Enter a title
and description of your pull request (these are normally a description 
related to the changes you made so you can convince me these are good enough 
changes to be added to my repo). Then click Create pull request.

Nice. I may or not approve it, but nice.
