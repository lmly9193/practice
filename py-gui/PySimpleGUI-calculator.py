#!/usr/bin/env python3

import PySimpleGUI as sg

class app():

    def __init__(self) :

        self.current = str('0')
        self.next = bool(False)
        self.calc = []

        sg.theme('Default1')
        layout = [
            [sg.Input(self.current, key='current', expand_x=True, justification='right')],
            [sg.Button('C'), sg.Button('<<'), sg.Button('%'), sg.Button('/')],
            [sg.Button('7'), sg.Button('8'), sg.Button('9'), sg.Button('*')],
            [sg.Button('4'), sg.Button('5'), sg.Button('6'), sg.Button('-')],
            [sg.Button('1'), sg.Button('2'), sg.Button('3'), sg.Button('+')],
            [sg.Button('+/-'), sg.Button('0'), sg.Button('.'), sg.Button('=')],
        ]
        self.window = sg.Window('小算盤', layout, auto_size_buttons = False)

    def run(self) :
        while True:
            event, values = self.window.read()
            # print(f"event: {event} values: {values}")

            if event == sg.WIN_CLOSED :
                break

            if event in ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'] :
                self.press_num(num = event)
            
            if event in ['+', '-', '*', '/', '%'] :
                self.press_op(op = event)
            
            if event == '+/-' :
                if float(self.current) > 0 :
                    self.current = str('-') + self.current
                elif float(self.current) < 0 :
                    self.current = self.current.lstrip('-')
                else :
                    pass
            if event == '.' :
                if '.' not in self.current :
                    self.current += str('.')
                else :
                    position = self.current.find('.')
                    self.current = self.current[:position]

            if event == '=' :
                self.press_calc()

            if event == 'C' :
                self.current = str('0')
                self.next = bool(False)
                self.calc = []
            
            if event == '<<' :
                self.current = self.current[:-1]
        
            self.update()

        self.window.close()
    
    def press_num(self, num) :
        # print(f'Press Num {str(num)}')
        if self.next is True :
            self.current = num
            self.next = False
        else :
            if self.current != '0' :
                self.current += num
            else :
                self.current = num

    def press_op(self, op) :
        # print(f'Press Operator {str(op)}')
        if self.next is True :
            self.calc[-1] = op
        else :
            self.calc.append(self.current)
            self.calc.append(op)
            self.next = True
    
    def press_calc(self) :
        self.calc.append(self.current)
        calc = ''
        for value in self.calc :
            calc += value
        self.current = str(eval(calc))
        self.calc = []

    def update(self) :
        self.window['current'].update(self.current)

if __name__ == '__main__':
    app = app()
    app.run()
