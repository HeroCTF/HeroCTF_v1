#!/usr/bin/python3
import subprocess


def readScript():
    toExecute = input('Enter your code below:\n')
    currentInput = ''
    while(currentInput != 'EOF' and toExecute != "EOF"):
        currentInput = input()
        if(currentInput != 'EOF'):
            toExecute += '; '+currentInput
    toExecute = toExecute.replace("'",'"')
    return toExecute

if __name__=='__main__':
    print('''
    Hey there, welcome to my updated server!\n
    Last time you have succeed to see my super secret files, now you can't!\n
    This is a python interpreter!, wrote anything you want, I will execute it for you!\n
    When you have finish to wrote your program, please enter "EOF"
    ''')

    while True:
        toExec = readScript()
        if 'os' in toExec:
            print("AHAHAHA no os module for you.")
        else:
            if 'ls' in toExec or 'cat' in toExec or 'cd' in toExec or 'more' in toExec or 'chmod' in toExec or 'exit' in toExec or 'echo' in toExec:
                print("This command is unavailable, this can be a part of the shell'enge.")
            else:
                if 'rm' in toExec:
                    print("Please don't disturb the instance. This will be reported.")
                else:
                    cmd = "python3 -c '" + toExec + "'"
                    subprocess.call(cmd, shell=True)
                    print("=============== END =================")

