import os
import glob

def interactive_rename(folder_path):
    image_extensions = ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.bmp', '*.webp', '*.tiff']
    image_files = []
    for ext in image_extensions:
        image_files.extend(glob.glob(os.path.join(folder_path, ext)))
        image_files.extend(glob.glob(os.path.join(folder_path, ext.upper())))
    
    image_files.sort()
    
    for old_path in image_files:
        print(f"\n目前檔案: {os.path.basename(old_path)}")
        new_name = input("輸入新名稱 (Enter 保留原名): ").strip()
        if new_name:
            folder = os.path.dirname(old_path)
            ext = os.path.splitext(os.path.basename(old_path))[1]
            if not new_name.endswith(ext.lower()) and not new_name.endswith(ext.upper()):
                new_name += ext
            new_path = os.path.join(folder, new_name)
            if old_path != new_path and os.path.exists(new_path):
                print("新名稱已存在，跳過！")
                continue
            os.rename(old_path, new_path)
            print(f"已重命名為: {new_name}")
        else:
            print("保留原名")

if __name__ == "__main__":
    folder_path = input("Enter folder path: ").strip()
    if os.path.exists(folder_path):
        interactive_rename(folder_path)
    else:
        print("Folder not found!")
